<?php

namespace controllers\user;

use app\Request;
use controllers\BaseController;
use helpers\clients\EmailClient;
use helpers\mappers\OrderStoreRequestMapper;
use helpers\services\CategoryService;
use helpers\utilities\ResponseUtility;
use helpers\validators\OrderStoreRequestValidator;
use model\Category;
use model\UserConnectorFavourite;

class ConnectorController extends BaseController
{
    public function addToFavourite(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            $order = UserConnectorFavourite::getModel($request);
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
}