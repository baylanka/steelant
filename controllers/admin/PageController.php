<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\LeafCategoryDTOCollection;
use model\Category;

class PageController extends BaseController
{
    public function index(Request $request)
    {
        $categories = Category::getAll();
        $leafCategoryDTO = new LeafCategoryDTOCollection($categories,'de',
            ' <i class="bi bi-arrow-right text-success"></i> ');
        $data = [
            'heading' => "Pages",
            'leaf_categories' => $leafCategoryDTO->getCollection()
        ];
        return view("admin/pages/index.view.php", $data);

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