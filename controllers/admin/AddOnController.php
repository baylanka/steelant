<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\middlewares\UserMiddleware;
use model\Category;

class AddOnController extends BaseController
{
    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdminOrDeveloper();
    }
    public function index(Request $request)
    {
        $categories = Category::getAll();
        $leafCategories = LeafCategoryDTOCollection::getCollection($categories);
        $data = [
            'leafCategories' => $leafCategories,
            'heading' => "Add-on"
        ];
        return view("admin/add-on-content/index.view.php", $data);

    }

    public function create(Request $request)
    {
        $data = [];
        return view("admin/add-on-content/create.view.php", $data);
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