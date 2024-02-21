<?php

namespace helpers\services;
class ResponseService
{
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const SUCCESS = 200;
    const HTTP_ERROR = 422;

    public static function abort($status_code = self::NOT_FOUND, $message = '', $page_banner = null)
    {
        http_response_code($status_code);
        $viewPath = "views/{$status_code}.php";
        if (!is_null($page_banner)) {
            $header = $page_banner;
        }

        if (file_exists($viewPath)) {
            require_once "views/{$status_code}.php";
        }

        die($message);
    }
}