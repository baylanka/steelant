<?php

namespace helpers\validators;

use app\Request;

class CategoryEditRequestValidator
{
    public static function validate(Request $request)
    {
        if(!$request->has('id') || empty($request->get('id'))){
            throw new \Exception("category identification missing to edit");
        }
    }
}