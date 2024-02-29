<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\mappers\MainCategoryStoreRequestMapper;
use helpers\utilities\ResponseUtility;
use helpers\validators\MainCategoryStoreRequestValidator;
use model\Category;

class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        $data = [
            'heading' => "Category",
            'categories' => Category::getFirstLevelCategories(),
        ];

        return view('admin/categories/index.view.php', $data);
    }

    public function createMainCategory(Request $request)
    {
        $data = [];
        return view('admin/categories/create-main.view.php', $data);
    }

    public function storeMainCategory(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            MainCategoryStoreRequestValidator::validate($request);
            $category = MainCategoryStoreRequestMapper::getModel($request);
            $category->save();
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => $category
            ]);
        }catch (\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}