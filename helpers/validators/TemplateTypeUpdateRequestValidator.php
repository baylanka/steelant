<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\Template;

class TemplateTypeUpdateRequestValidator
{
    public static function validate(Request $request)
    {
        self::typeValidation($request);
        self::idValidation($request);
    }

    private static function idValidation($request)
    {
        if(!$request->has('id')){
            ResponseUtility::response("template identity is missing.",422);
        }
    }

    private static function typeValidation($request)
    {
        if(!ValidatorUtility::required($request->all(), 'type')){
            ResponseUtility::response("template type is required", 422);
        }

        if(!in_array($request->get('type'),[Template::TYPE_CONNECTOR, Template::TYPE_ADD_ON])){
            ResponseUtility::response("template type is invalid", 422);
        }
    }
}