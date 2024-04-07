<?php

namespace helpers\validators;

use app\Request;
use helpers\repositories\ConnectorRepository;
use helpers\utilities\ResponseUtility;

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

        $name = $request->get('name');
        $categoryId = $request->get('category');

        if(!ConnectorRepository::isNameUnique($categoryId, $name)){
            ResponseUtility::response('Connector name is duplicated',422, [
                "already there is a connector with the `same name` for the category"
            ]);
        }
    }
}