<?php

namespace controllers\admin;

use model\User;

class UserController
{
    public function index()
    {


        $users = User::getAll();
        $data = [
            "users" => $users
        ];
        return view("admin/users/index.view.php", $data);

    }

}