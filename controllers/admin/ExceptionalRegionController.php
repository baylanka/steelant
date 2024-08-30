<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\services\CategoryService;
use helpers\services\ExceptionalRegionService;
use helpers\utilities\ResponseUtility;
use model\ExceptionalRegion;

class ExceptionalRegionController extends BaseController
{
    public function edit(Request $request)
    {
        $categoryId = $request->get('category_id');
        $categoryTree = CategoryService::getCategoryTreeFromLeafCategoryId($categoryId);
        $data = [
            'categoryTree' => $categoryTree,
            'category_id' => $categoryId,
        ];
        return view('admin/categories/update-exceptional-regions.view.php', $data);
    }

    public function update(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try {
            $db->beginTransaction();
            $categoryId = $request->get('category_id');
            $regions = $request->get('regions', []);
            ExceptionalRegionService::update($categoryId, $regions);
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully updated",
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }
}