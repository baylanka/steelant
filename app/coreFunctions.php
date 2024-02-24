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

function view($path, $data)
{
    extract($data);
    return require_once basePath("views/" . $path);
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
    var_dump($resource);
    echo $isShellExecution ? "\n" : "</pre>";
    die;
}

