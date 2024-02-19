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

function url($uri) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    return $protocol . $host . $path . '/' . ltrim($uri, '/');
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

