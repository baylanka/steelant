<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\User;

class UserUpdateRequestValidator
{

    public static function validate(Request $request)
    {

        if (!ValidatorUtility::email($request->get("email"))) {
            ResponseUtility::response("Please provide valid email.",423,["key"=>"email"]);
        }

        $user =  User::query("SELECT COUNT(*) AS mail FROM users WHERE email=:email",["email"=>$request->get("email")])->first();
        if($user->mail != 0){
            ResponseUtility::response("Mail already in use.",423,["key"=>"email"]);
        }


    }




}