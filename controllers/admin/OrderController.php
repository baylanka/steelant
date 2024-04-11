<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\middlewares\UserMiddleware;
use model\Order;

class OrderController extends BaseController
{

    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdminOrDeveloper();
    }

    public function index(Request $request){

        $orders = Order::getAll();
        $data = [
            'heading' => "Orders",
            'orders' => $orders,
        ];
        return view("admin/orders/index.view.php", $data);
    }

}