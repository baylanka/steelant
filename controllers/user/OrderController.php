<?php

namespace controllers\user;

use controllers\BaseController;
use helpers\clients\EmailClient;
use helpers\mappers\OrderStoreRequestMapper;
use helpers\utilities\ResponseUtility;
use helpers\validators\OrderStoreRequestValidator;
use app\Request;
use model\Connector;

class OrderController extends BaseController
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
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            OrderStoreRequestValidator::validate($request);
            $order = OrderStoreRequestMapper::getModel($request);
            $order->save();

            $mail = new EmailClient();
            $mail->sendOrderPlacedMail($request);

            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Order placed successfully.",
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }



    }


}