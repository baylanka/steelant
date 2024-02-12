<?php

namespace helpers\services;

use app\PathPool;
use app\Request;

class RouteService
{
    public static function index()
    {
        $routes = require_once basePath("/routes/web.php");
        $request = new Request();
        $uri = $request->getRequestedUri();
        $method = $request->getRequestedMethod();
        if (!array_key_exists($uri, $routes)) {
            ResponseService::abort();
        } else if (!array_key_exists($method, $routes[$uri])) {
            ResponseService::abort(ResponseService::HTTP_ERROR, 'Requested method is supported');
        }


        $controllerPath = $routes[$uri][$method][0];
        //controllers may come with directory prefix like admin/UserController.php
        $controllerPathHierarchy = explode('/', $controllerPath);
        $controllerName = str_replace('.php', '', $controllerPathHierarchy[sizeof($controllerPathHierarchy) - 1]);
        $controllerName = "controllers\\" . $controllerName;
        $controllerPath = basePath($controllerName . ".php");
        $method = $routes[$uri][$method][1];

        if(!file_exists($controllerPath)){
            throw new \Exception("Controller does not exist.");
        }

        require_once basePath("/controllers/BaseController.php");
        require_once $controllerPath;
        $obj = new $controllerName();
        return $obj->$method($request);
    }
}