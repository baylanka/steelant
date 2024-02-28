<?php

namespace helpers\utilities;

class ResponseUtility
{
    public static function response($message, $statusCode, $errors = [])
    {
        http_response_code($statusCode);

        echo json_encode([
            'message' => $message,
            'errors' => $errors
        ]);

        die;
    }
}