<?php

namespace helpers\utilities;

class ResponseUtility
{
    public static function response(string $message, int $statusCode, array $errors = [])
    {
        http_response_code($statusCode);

        echo json_encode([
            'message' => $message,
            'errors' => $errors
        ]);

        die;
    }

    public static function sendResponseByArray(array $response, $statusCode=200)
    {
        http_response_code($statusCode);
        echo json_encode($response);
        die;
    }
}