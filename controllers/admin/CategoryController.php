<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
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