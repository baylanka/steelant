<?php

namespace app;

use helpers\services\ResponseService;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    private function add(string $uri, string $method, array $dest)
    {
        $this->routes[$uri][$method] = $dest;
    }

    public function get(string $uri, array $dest)
    {
        $this->add($uri, 'GET', $dest);
    }

    public function post(string $uri, array $dest)
    {
        $this->add($uri, 'POST', $dest);
    }

    public function delete(string $uri, array $dest)
    {
        $this->add($uri, 'DELETE', $dest);
    }

    public function put(string $uri, array $dest)
    {
        $this->add($uri,'PUT', $dest);
    }

    public function patch(string $uri, array $dest)
    {
        $this->add($uri,'PATCH', $dest);
    }

    public function listener()
    {
        $routes = $this->routes;
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