<?php
function basePath($path)
{
    $firstChar = substr($path,0,1);
    if($firstChar === "/"){
        $path = substr($path,1, strlen($path));
    }
    return (__DIR__ . "/../" . $path);
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