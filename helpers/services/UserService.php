<?php

namespace helpers\services;

use app\Request;
use helpers\utilities\ResponseUtility;
use model\User;

class UserService
{

    public static function login(Request $request)
    {
        $user = User::query("SELECT * FROM users WHERE user_name=:user_name", ["user_name" => $request->get("user_name")])->first();

        if ($user->password !== md5($request->get("password"))) {
            ResponseUtility::response("Please check your password.", 423, ["key" => "password"]);
        }

        return $user;
    }

}