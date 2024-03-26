<?php

namespace helpers\validators;

use app\Request;

class ConnectorStoreRequestValidator
{
    public static function validate(Request $request)
    {
        self::categoryValidation($request);
        self::nameValidation($request);
    }
    private static function categoryValidation(Request $request)
    {
        if(!$request->has('category') || empty($request->get('category'))){
            throw new \Exception("category is required to store.");
        }
    }
    private static function nameValidation(Request $request)
    {
        if(!$request->has('name') || empty($request->get('name'))){
            throw new \Exception("name is required to store.");
        }
    }
}