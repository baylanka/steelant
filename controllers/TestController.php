<?php

namespace controllers;

use app\Request;
use controllers\BaseController;
use model\User;

class TestController extends BaseController
{
    public function test(Request $request)
    {
        global $container;
        $db1 = $container->resolve("DB");
        $db2 = $container->resolve("DB");
        $db3 = $container->resolve("DB");
        var_dump($db1 == $db2);
        var_dump($db1 == $db3);
        var_dump($db2 == $db3);
    }
}