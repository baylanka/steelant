<?php

namespace controllers\user;

use controllers\BaseController;
use helpers\clients\EmailClient;
use helpers\mappers\OrderStoreRequestMapper;
use helpers\services\ConnectorService;
use helpers\services\OrderService;
use helpers\translate\Translate;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use helpers\validators\OrderStoreRequestValidator;
use app\Request;
use model\Connector;

class OrderController extends BaseController
{

    public function create(Request $request)
    {
        $connectorId = $request->get("id");
        $lang = Translate::getLang();
        $user = [];

        $data = [
            "connector" => ConnectorService::getDTOById($connectorId, $lang),
            "user" => $user,
            "lang" => $request->get("lang")
        ];
        return view("user/includes/create_order.view.php", $data);
    }


    public function store(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            OrderStoreRequestValidator::validate($request);
            $order = OrderStoreRequestMapper::getModel($request);
            $order->save();

            $mail = new EmailClient();
            $mail->sendOrderPlacedMail($order);

            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Order placed successfully.",
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
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
            ResponseUtility::sendResponseByArray([
                "message" => "Deleted successfully.",
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }


}