<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\User;

class UserUpdatePasswordRequestValidator
{

    public static function validate(Request $request)
    {

        self::requireds($request);
        $user = User::getById($_SESSION["user"]->id);
        $isPasswordValid =  password_verify( md5($request->get('old_password')), $user->password);

        if (!$isPasswordValid) {
            ResponseUtility::response("Old password provided invalid.", 423, ["key" => "old_password"]);
        }

        if($request->get('new_password') !== $request->get('verify_password') ){
            ResponseUtility::response("Please verify your password properly. Provided verify password does not match.", 423, ["key" => "new_password"]);
        }

    }

    private static function requireds(Request $request)
    {

        if (!ValidatorUtility::required($request->all(), "old_password")) {
            ResponseUtility::response("Please provide your old password.", 423, ["key" => "old_password"]);
        }
        if (!ValidatorUtility::required($request->all(), "new_password")) {
            ResponseUtility::response("Please provide new password.", 423, ["key" => "new_password"]);
        }
        if (!ValidatorUtility::required($request->all(), "new_password")) {
            ResponseUtility::response("Please provide verify password.", 423, ["key" => "new_password"]);
        }

    }


}