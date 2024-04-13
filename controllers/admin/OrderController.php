<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\middlewares\UserMiddleware;
use helpers\services\OrderService;
use helpers\utilities\ResponseUtility;
use model\Order;

class OrderController extends BaseController
{

    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdminOrDeveloper();
    }

    public function index(Request $request)
    {

        $orderCounts = OrderService::counts();
        $orders = OrderService::getAll($request);
        $data = [
            'heading' => "Orders",
            'orders' => $orders,
            'counts' => $orderCounts
        ];
        return view("admin/orders/index.view.php", $data);
    }


    public function changeStatus(Request $request){
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            OrderService::changeStatus($request);
            $db->commit();
            header('Location: ' . url("/admin/orders"));
        }catch(\Exception $ex){
            $db->rollBack();
            header('Location: ' . url("/admin/orders"));
        }
    }

    public function destroy(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            OrderService::deleteById($request->get("id"));
            $db->commit();
            header('Location: ' . url("/admin/orders"));
        }catch(\Exception $ex){
            $db->rollBack();
            header('Location: ' . url("/admin/orders"));
        }
    }



}