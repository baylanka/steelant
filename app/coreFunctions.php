<?php
function basePath($path)
{
    $firstChar = substr($path,0,1);
    if($firstChar === "/"){
        $path = substr($path,1, strlen($path));
    }
    $path = __DIR__ . "/../" . $path;
    return str_replace("\\", "/", $path);
}

function view($path, $data=[])
{
    extract($data);
    return require_once basePath("views/" . $path);
}

function view_str($path, $data=[])
{
    ob_start();
    extract($data);
    require_once basePath("views/" . $path);
    return ob_get_clean();
}

function public_path($path)
{
    $firstChar = substr($path,0,1);
    if($firstChar === "/"){
        $path = substr($path,1, strlen($path));
    }
    return basePath("public/" . $path);
}

function storage_path($path)
{
    $firstChar = substr($path,0,1);
    if($firstChar === "/"){
        $path = substr($path,1, strlen($path));
    }
    return basePath("storage/" . $path);
}

function assets($path)
{
    $firstChar = substr($path,0,1);
    if($firstChar === "/"){
        $path = substr($path,1, strlen($path));
    }
    return url("/public/" .$path);

}

function url($uri) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];

    // Get the root directory
    $rootDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

    // Remove trailing slashes
    $rootDir = rtrim($rootDir, '/');

    // Remove "/index.php" if present
    $rootDir = str_replace("/index.php", "", $rootDir);

    // Construct the full URL
    return  $protocol . $host . $rootDir . '/' . ltrim($uri, '/');
}

function preloader()
{
    header('Content-Type: text/html; charset=utf-8');
    $pageRoutes = [];
    ini_set('post_max_size', '40M');
    ini_set('upload_max_filesize', '40M');
    ini_set('max_file_uploads', '40');
    session_start();
    \helpers\services\LanguageService::setLanguage();
}


function autoRegister()
{
    spl_autoload_register(function ($require_class) {
        $require_class = str_replace('model', 'models', $require_class);
        require_once basePath($require_class . ".php");
    });
}

function dd($resource)
{
    $isShellExecution = strtolower(PHP_SAPI) === 'cli';
    echo $isShellExecution ? "\n" : "<pre>";
    if(is_array($resource) || is_object($resource)){
        print_r($resource);
    }else{
        var_dump($resource);
    }
    echo $isShellExecution ? "\n" : "</pre>";
    die;
}

function isRequestedRoute($route){
    $firstChar = substr($route,0,1);
    $route = $firstChar === "/" ? $route : "/{$route}";
    return strtok($_SERVER['REQUEST_URI'],"?") === $route;
}



function get_url_by_lang($url)
{
    switch (\helpers\translate\Translate::getLang()){
        case "en-gb":
        case "en-us":
            return url($url["en"]);
        case "de":
            return url($url["de"]);
        case "fr":
            return url($url["fr"]);
    }






}
