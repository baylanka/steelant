<?php

namespace helpers\services;

class RequestService
{
    public static function isRequestedRoute($route)
    {
        return $_SERVER['REQUEST_URI'] === $route;
    }
}