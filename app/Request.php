<?php

namespace app;
class Request
{
    private string $uri;
    private string $method;
    private array $payload = [];

    public function __construct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $this->uri = parse_url($uri)['path'];
        $this->method = strtoupper($_SERVER['REQUEST_METHOD']);

        $this->setPayload();
    }

    private function setPayload()
    {
        switch (strtoupper($this->method)) {
            case 'GET':
                $this->payload = $_GET;
                break;
            case 'POST':
                $this->payload = $_POST;
                break;
            case 'PUT':
            case 'PATCH':
                $this->payload = $this->grabStreamInputRawPayload();
                break;
            default:
                $this->payload = [];
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

    public function getRequestedUri()
    {
        return $this->uri;
    }

    public function getRequestedMethod()
    {
        return $this->method;
    }

    public function all(): array
    {
        return $this->payload;
    }

    public function get($key, $default = null): array
    {
        if (!array_key_exists($key, $this->payload)) {
            return $default;
        }

        return $this->payload[$key];
    }

    public function excepts(array $values): array
    {
        return array_filter(
            $this->payload,
            function ($key) use ($values) {
                return !in_array($key, $values);
            },
            ARRAY_FILTER_USE_KEY
        );
    }



}