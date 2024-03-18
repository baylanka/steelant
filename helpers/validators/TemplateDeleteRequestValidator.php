<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;
use model\Template;

class TemplateDeleteRequestValidator
{
    public static function validate(Request $request)
    {
        self::idValidation($request);
        self::isDeletableValidation($request);
    }

    private static function idValidation($request)
    {
        if(!$request->has('id')){
            ResponseUtility::response("template identity is missing.",422);
        }
    }

    private static function isDeletableValidation(Request $request)
    {
        $template = Template::getById($request->get('id'));
        if(!$template->isDeletable()){
            ResponseUtility::response("template is used. It can not be deleted",422);
        }
    }
}