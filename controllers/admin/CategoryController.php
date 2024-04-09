<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\CategoryDTO;
use helpers\mappers\MainCategoryStoreRequestMapper;
use helpers\mappers\SubCategoryStoreRequestMapper;
use helpers\mappers\UpdateCategoryRequestMapper;
use helpers\middlewares\UserMiddleware;
use helpers\repositories\CategoryRepository;
use helpers\services\CategoryService;
use helpers\utilities\ResponseUtility;
use helpers\validators\CategoryEditRequestValidator;
use helpers\validators\CategoryUpdateRequestValidator;
use helpers\validators\MainCategoryStoreRequestValidator;
use helpers\validators\SubCategoryDeleteRequest;
use helpers\validators\SubCategoryStoreRequestValidator;
use model\Category;

class CategoryController extends BaseController
{
    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdmin();
    }
    public function index(Request $request)
    {
        $categories = CategoryRepository::getAllByOrder();
        $arrangedCategories = CategoryService::organizeCategoriesByParentCategories($categories);
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

    public function destroySubCategory(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            SubCategoryDeleteRequest::validate($request);
            CategoryRepository::deleteWithRelevantObjects($request->get('id'));
            $db->commit();
            parent::response("Successfully deleted",);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[
                $ex->getTraceAsString()
            ],422);
        }
    }

    public function edit(Request $request)
    {
        try{
            CategoryEditRequestValidator::validate($request);
            $data = [
                'category' => Category::getById($request->get('id')),
            ];

            return view('admin/categories/edit.view.php', $data);
        }catch(\Exception $err){
            parent::response($err->getMessage(),[],422);
        }
    }

    public function update(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            CategoryUpdateRequestValidator::validate($request);
            $category = UpdateCategoryRequestMapper::getModel($request);
            $category->update();
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