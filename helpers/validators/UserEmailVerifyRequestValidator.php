<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ValidatorUtility;

class UserEmailVerifyRequestValidator
{


    public static function validate(Request $request)
    {
        if(!ValidatorUtility::required($request->all(), "key") == 1){
            header("Location: " . url("/"));
            die;
        }

    }


}