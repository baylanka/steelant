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
        $currentUser =  User::query("SELECT email FROM users WHERE id=:id",["id"=>$_SESSION["user"]->id])->first();
        if($request->get("email") !== $currentUser->email && $user->mail != 0){
            ResponseUtility::response("Mail already in use.",423,["key"=>"email"]);
        }


    }




}