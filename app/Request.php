<?php

namespace app;
class Request
{
    private string $uri;
    private string $method;
    private array $payload = [];

    public function __construct()
    {
        $this->setUri();
        $this->method = strtoupper($_SERVER['REQUEST_METHOD']);

        $this->setPayload();
        $this->attachUrlQueries();
        $this->filter();
    }

    public function getRequestedUri()
    {
        return $this->uri;
    }

    public function getRequestedMethod()
    {
        return $this->method;
    }

    public function all($remove_tags=true): array
    {
        if(!$remove_tags){
            return $this->payload;
        }
        return self::removeTags($this->payload);
    }

    public function has($key): bool
    {
        return array_key_exists($key, $this->payload);
    }

    public function get($key, $default = null, $remove_tags=true)
    {
        if (!array_key_exists($key, $this->payload)) {
            return $default;
        }

        if(!$remove_tags) {
            return $this->payload[$key];
        }

        return self::removeTags($this->payload[$key]);
    }

    public function excepts(array $values, $remove_tags=true): array
    {
        $filteredArray = array_filter(
            $this->payload,
            function ($key) use ($values) {
                return !in_array($key, $values);
            },
            ARRAY_FILTER_USE_KEY
        );
        if(!$remove_tags) {
            return $filteredArray;
        }

        return self::removeTags($filteredArray);
    }

    private function filter()
    {
        foreach ($this->payload as $key => $value){
            $value = self::removeWhiteSpaces($value);
            $value = self::removeScriptTag($value);
            $sanitizedInput = self::encodeHtmlSpecialChars($value);
            $this->payload[$key] = $sanitizedInput;
        }
    }

    private static function encodeHtmlSpecialChars($value)
    {
        if(!is_array($value)){
            //encode html tags to html entities
            return  htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        foreach ($value as $key => $each){
            $value[$key] = self::encodeHtmlSpecialChars($each);
        }

        return $value;
    }

    private static function removeScriptTag($value)
    {
        if(!is_array($value)){
            //remove script tags
            return  preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $value);
        }

        foreach ($value as $key => $each){
            $value[$key] = self::removeScriptTag($each);
        }

        return $value;
    }

    private static function removeWhiteSpaces($value)
    {
        if(!is_array($value)){
            return trim($value);
        }

        foreach ($value as $key => $each){
            $value[$key] = self::removeWhiteSpaces($each);
        }

        return $value;
    }

    private function setPayload()
    {
        switch (strtoupper($this->method)) {
            case 'GET':
                $this->payload = $_GET;
                break;
            case 'POST':
                $this->payload = $_POST;
                if(!empty(sizeof($_FILES))){
                    foreach ($_FILES as $key => $file){
                        $this->payload[$key] = array_merge($this->payload[$key] ?? [], $file);
                    }
                }
                break;
            case 'PUT':
            case 'PATCH':
                $this->payload = $this->grabStreamInputRawPayload();
                break;
            default:
                $this->payload = [];
        }
    }

    private function attachUrlQueries()
    {
        if(!isset($_SERVER['QUERY_STRING'])) return;
        $queries = [];
        parse_str($_SERVER['QUERY_STRING'], $queries);
        foreach ($queries as $key => $value){
            $this->payload[$key] = $value;
        }
    }

    private function grabStreamInputRawPayload()
    {
        $data = file_get_contents('php://input');
        $parts = explode("--", $data);

        $putData = [];
        foreach ($parts as $part) {
            if (trim($part) !== '') {
                $headerPart = explode("\r\n", $part, 2);
                $cleanedString = preg_replace('/Content-Disposition: form-data; name="([^"]+)"/', '$1', $headerPart[1]);
                $pair = explode("\r\n\r\n", $cleanedString);
                $key = trim(str_replace(["\n", "\r", "\s", "\t"], '', $pair[0]));
                $value = trim(str_replace(["\n", "\r", "\s", "\t"], '', $pair[1]));
                if (empty($key) || empty($value)) continue;
                $putData[$key] = $value;
            }
        }
        return $putData;


    }

    private static function removeTags($value)
    {
        if(!is_array($value)){
            return  strip_tags(htmlspecialchars_decode($value));
        }

        foreach ($value as $key => $each){
            $value[$key] = self::removeTags($each);
        }

        return $value;
    }

    private function removeSubDirectoryPath(array $uriParts)
    {
        global $env;
        if(!isset($env['SUB_DIR_PATH']) && empty($env['SUB_DIR_PATH'])){
            return $uriParts;
        }
        $subDirPathStr = $env['SUB_DIR_PATH'];
        $subDirPathArray = explode('/', $subDirPathStr);

        $iteration = 0;
        foreach ($uriParts as $index => $value){
            if($value !== $subDirPathArray[$iteration]){
                continue;
            }

            unset($uriParts[$index]);
            if($iteration == sizeof($subDirPathArray)-1){
                break;
            }
            $iteration++;
        }

        return $uriParts;
    }

    private function setUri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uriParts = explode('/',parse_url($uri)['path']);
        $filteredUriParts = array_filter($uriParts, function($value) {
            return trim($value) !== '';
        });

        $filteredUriParts = self::removeSubDirectoryPath($filteredUriParts);

        $uri = "/" . implode("/", $filteredUriParts);
        $this->uri = $uri;
    }
}