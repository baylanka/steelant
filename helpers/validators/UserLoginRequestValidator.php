<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\User;

class UserLoginRequestValidator
{
    public static function validate(Request $request)
    {

        self::requireds($request);

        $user =  User::query("SELECT COUNT(*) AS mail FROM users WHERE user_name=:user_name",["user_name"=>$request->get("user_name")])->first();
        if($user->mail == 0){
            ResponseUtility::response("You are not registered yet.",423,["key"=>"user_name"]);
        }


        if (strlen($request->get("user_name")) < 1) {
            ResponseUtility::response("Please enter valid username.", 423, ["key" => "user_name"]);
        }
        if (strlen($request->get("password")) < 8) {
            ResponseUtility::response("Password must contain 8 characters.", 423, ["key" => "password"]);
        }

    }


    private static function requireds(Request $request)
    {

        if (!ValidatorUtility::required($request->all(), "user_name")) {
            ResponseUtility::response("Please provide your username.", 423, ["key" => "user_name"]);
        }
        if (!ValidatorUtility::required($request->all(), "password")) {
            ResponseUtility::response("Please provide your password.", 423, ["key" => "password"]);
        }

    }
}