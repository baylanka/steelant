<?php

namespace helpers\services;

use app\Request;
use helpers\utilities\ResponseUtility;
use model\User;

class UserService
{

    public static function login(Request $request)
    {
        $user = User::query("SELECT * FROM users WHERE email=:email", ["email" => $request->get("email")])->first();


        if($user->email_verified == 0){
            ResponseUtility::response("Your email has not been verified yet. Please check your inbox.", 423, ["key" => "email"]);
        }


        $isPasswordValid =  password_verify( md5($request->get('password')), $user->password);

        if (!$isPasswordValid) {
            ResponseUtility::response("Please check your password.", 423, ["key" => "password"]);
        }

        return $user;
    }




    public static function verify_email(Request $request)
    {

        $key = $request->get("key");

        $key = str_replace(User::KEY_PREFIX,"",$key);

        $key = str_replace(User::KEY_SUFFIX,"",$key);

        $user =  User::query("SELECT *  FROM users WHERE verification_key=:verification_key",["verification_key"=>trim($key)])->first();
        if(!$user){
            header("Location: " . url("/"));
            die;
        }


        User::updateById($user->id,["verification_key"=>"","email_verified"=> 1]);

    return $user;
    }

}