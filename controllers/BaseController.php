<?php

namespace controllers;
class BaseController
{
    protected static function response($message, $errors=[], $statusCode = 200)
    {
        http_response_code($statusCode);

        echo json_encode([
            'message' => $message,
            'errors' =>  $errors
        ]);
    }
}
