<?php

namespace helpers\services;

use app\Request;

class RouteService
{
    public static function index()
    {
        $routes = require_once "routes/web.php";
        $request = new Request();
        $uri = $request->getRequestedUri();
        $method = $request->getRequestedMethod();
        if (!array_key_exists($uri, $routes)) {
            return ResponseService::abort();
        } else if (!array_key_exists($method, $routes[$uri])) {
            return ResponseService::abort(ResponseService::HTTP_ERROR, 'Requested method is supported');
        }


        $classPath = $routes[$uri][$method][0];
        $classPathArray = explode('/', $classPath);
        $className = str_replace('.php', '', $classPathArray[sizeof($classPathArray) - 1]);
        $method = $routes[$uri][$method][1];

        require_once $classPath;

        $obj = new $className();
        return $obj->$method($request);
    }
}