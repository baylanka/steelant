<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\User;


class UserCreateRequestValidator
{

    public static function validate(Request $request)
    {

        self::requireds($request);

        if (!ValidatorUtility::email($request->get("email"))) {
            ResponseUtility::response("Please provide valid email.",423,["key"=>"email"]);
        }

        if(strlen($request->get("password")) < 8){
            ResponseUtility::response("Password must contain 8 characters.",423,["key"=>"password"]);
        }


        $user =  User::query("SELECT COUNT(*) AS mail FROM users WHERE email=:email",["email"=>$request->get("email")])->first();
        if($user->mail != 0){
            ResponseUtility::response("You are already registered.",423,["key"=>"email"]);
        }

    }


    private static function requireds(Request $request)
    {

        if (!ValidatorUtility::required($request->all(),"name")) {
            ResponseUtility::response("Please provide your name.",423,["key"=>"name"]);
        }

        if (!ValidatorUtility::required($request->all(),"job_position")) {
            ResponseUtility::response("Please provide your job / position.",423,["key"=>"job_position"]);
        }
        if (!ValidatorUtility::required($request->all(),"country_or_state")) {
            ResponseUtility::response("Please provide your country / state.",423,["key"=>"country_or_state"]);
        }
        if (!ValidatorUtility::required($request->all(),"email")) {
            ResponseUtility::response("Please provide your email.",423,["key"=>"email"]);
        }
        if (!ValidatorUtility::required($request->all(),"password")) {
            ResponseUtility::response("Please provide your password.",423,["key"=>"password"]);
        }

    }

}