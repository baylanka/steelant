<?php
namespace controllers\user;

use app\Request;
use controllers\BaseController;
use helpers\services\CategoryService;
use model\Category;

class ConnectorController extends BaseController
{
    public function index(Request $request)
    {
        $categories = Category::getAll();
        $arrangedCategories = CategoryService::arrangeCategoryTreeView($categories);
        $data = [
            'heading' => "Category",
            'categories' => $arrangedCategories,
        ];
        return view("user/connector.view.php", $data);
    }
}