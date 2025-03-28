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

        self::requireds($request);

        if (!ValidatorUtility::email($request->get("email"))) {
            ResponseUtility::response("Please provide valid email.",423,["key"=>"email"]);
        }

        $user =  User::query("SELECT COUNT(*) AS mail FROM users WHERE email=:email",["email"=>$request->get("email")])->first();
        $currentUser =  User::query("SELECT email FROM users WHERE id=:id",["id"=>$_SESSION["user"]->id])->first();
        if($request->get("email") !== $currentUser->email && $user->mail != 0){
            ResponseUtility::response("Mail already in use.",423,["key"=>"email"]);
        }


    }


    private static function requireds(Request $request)
    {

        if (!ValidatorUtility::required($request->all(),"name")) {
            ResponseUtility::response("Please provide your name.",423,["key"=>"name"]);
        }
        if (!ValidatorUtility::required($request->all(),"title")) {
            ResponseUtility::response("Please provide your title.",423,["key"=>"title"]);
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


    }



}