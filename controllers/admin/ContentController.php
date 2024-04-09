<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\repositories\CategoryContentRepository;
use helpers\utilities\ResponseUtility;

class ContentController extends BaseController
{
    public function updateDisplayOrderList(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try {
            $db->beginTransaction();
            $contentListAsOrder = $request->get('content_order');
            CategoryContentRepository::updateContentsDisplayOrder($contentListAsOrder);
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Display order is updated"
            ]);
        }catch(\Exception $ex){
            parent::response($ex->getMessage(),[],422);
        }
    }
}