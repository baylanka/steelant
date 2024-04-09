<?php

namespace helpers\mappers;

use app\Request;
use model\Connector;
use model\User;

class UserCreateRequestMapper
{

    public static function getModel(Request $request): User
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->title = $request->get('title');
        $user->type = $request->get('type');
        $user->job_position = $request->get('job_position');
        $user->division = $request->get('division');
        $user->company_name = $request->get('company_name');
        $user->country_or_state = $request->get('country_or_state');
        $user->email = $request->get('email');
        $user->website = $request->get('website');
        $user->phone = $request->get('phone');
        $user->email_verified = 1;
        $user->password = password_hash(md5($request->get('password')), PASSWORD_BCRYPT);
        $user->verification_key = bin2hex(openssl_random_pseudo_bytes(50));

        $user->newsletter = 0;
        if ($request->get("newsletter_subscribe") !== null && $request->get("newsletter_subscribe") == "on") {
            $user->newsletter = 1;
        }

        return $user;
    }

}