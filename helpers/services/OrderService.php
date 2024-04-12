<?php

namespace helpers\services;

use app\Request;
use model\Order;

class OrderService
{

    public static function getAll(Request $request)
    {
        return Order::getAll();
    }

    public static function counts()
    {
        $total_count = Order::query("SELECT COUNT(*) AS count FROM orders")->first();
        $total_completed = Order::query("SELECT COUNT(*) AS count FROM orders WHERE status = 'completed'")->first();
        $total_pending = Order::query("SELECT COUNT(*) AS count FROM orders WHERE status = 'pending'")->first();
        $total_rejected = Order::query("SELECT COUNT(*) AS count FROM orders WHERE status = 'rejected'")->first();


        return [
            "total_count" => $total_count->count,
            "total_completed" => $total_completed->count,
            "total_pending"=> $total_pending->count,
            "total_rejected"=> $total_rejected->count
        ];
    }


}