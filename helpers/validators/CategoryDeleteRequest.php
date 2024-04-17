<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;

class CategoryDeleteRequest
{
    public static function validate(Request $request)
    {
        if(!$request->has('id')){
            ResponseUtility::response("category identity is missing.",422);
        }
    }
}