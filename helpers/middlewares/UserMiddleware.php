<?php

namespace helpers\middlewares;

class UserMiddleware
{

    public static function isLoggedIn()
    {
        if (!isset($_SESSION["auth"]) && $_SESSION["auth"] !== true)
            header('Location: ' . url("/login"));
    }



    public static function isAdmin()
    {
        if ($_SESSION["user"]->type != "admin")
            header('Location: ' . url("/"));
    }


    public static function isDeveloper()
    {
        if ($_SESSION["user"]->type != "developer")
            header('Location: ' . url("admin/categories"));
    }

    public static function isAdminOrDeveloper()
    {
        if ($_SESSION["user"]->type != "admin" && $_SESSION["user"]->type != "developer")
            header('Location: ' . url("/"));
    }

}