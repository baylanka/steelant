<?php

namespace controllers\user;

use http\Client\Curl\User;
use app\Request;
use model\Connector;

class OrderController
{

    public function create_view(Request $request)
    {

        $connector = Connector::getById($request->get("id"));
        $user = [];

        $data = [
            "connector" => $connector,
            "user" => $user,
            "lang" => $request->get("lang")
        ];
        return view("user/includes/create_order.view.php", $data);
    }


    public function create(Request $request)
    {

        print_r($request->all());
        die;
    }


}