<?php

namespace helpers\middlewears;

class UserMiddlewear
{

    public static function isLoggedIn()
    {

        if(!isset($_SESSION["auth"]) && $_SESSION["auth"] !== true){
            header('Location: '.url("/login?redirect=favourite"));
        }

    }

}