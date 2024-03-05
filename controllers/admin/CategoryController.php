<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\CategoryDTO;
use helpers\mappers\MainCategoryStoreRequestMapper;
use helpers\mappers\SubCategoryStoreRequestMapper;
use helpers\services\CategoryService;
use helpers\utilities\ResponseUtility;
use helpers\validators\MainCategoryStoreRequestValidator;
use helpers\validators\SubCategoryStoreRequestValidator;
use model\Category;

class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        $categories = Category::getAll();
        $arrangedCategories = CategoryService::arrangeCategoryHierarchy($categories);
        $data = [
            'heading' => "Category",
            'categories' => $arrangedCategories,
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
            $categoryDTO = new CategoryDTO($category);
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => $categoryDTO
            ]);
        }catch (\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }


    public function createSubCategory(Request $request)
    {
        $parentCategoryId = $request->get('parent_id');
        $categoryTree = CategoryService::getCategoryTreeFromLeafCategoryId($parentCategoryId);
        $data = [
            'categoryTree' => $categoryTree,
            'parent_id' => $parentCategoryId
        ];
        return view('admin/categories/create-sub.view.php', $data);
    }

    public function storeSubCategory(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            SubCategoryStoreRequestValidator::validate($request);
            $category = SubCategoryStoreRequestMapper::getModel($request);
            $category->save();
            $db->commit();
            $categoryDTO = new CategoryDTO($category);
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => $categoryDTO
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[
                $ex->getTraceAsString()
            ],422);
        }
    }
}