<?php

namespace helpers\services;

use app\Request;
use model\Order;
use model\User;

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
            "total_pending" => $total_pending->count,
            "total_rejected" => $total_rejected->count
        ];
    }


    public static function getByUser($userId)
    {
        return Order::query("
        SELECT orders.*, connectors.name AS connector_name,connectors.id AS connector_id, category_contents.leaf_category_id FROM orders 
         LEFT JOIN connectors ON orders.connector_id = connectors.id
         INNER JOIN category_contents ON connectors.id = category_contents.element_id 
         WHERE user_id =:user_id AND category_contents.type = 'connector'", ["user_id" => $userId])->get();
    }

    public static function deleteById($id)
    {
        Order::deleteById($id);
    }

    public static function changeStatus(Request $request)
    {
        if($request->get("status") == null || $request->get("status") !== Order::STATUS_PENDING || $request->get("status") !== Order::STATUS_COMPLETED || $request->get("status") !== Order::STATUS_REJECTED){
            header('Location: ' . url("/admin/orders"));
        }

        Order::updateById($request->get("id"), ["status" => $request->get("status")]);
    }

}