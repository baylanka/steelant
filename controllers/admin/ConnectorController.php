<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\LeafCategoryDTOCollection;
use model\Category;

class ConnectorController extends BaseController
{
    public function index(Request $request)
    {
        global $env;
        $data = [
            'heading' => "Connectors"
        ];
        return view("admin/connectors/index.view.php", $data);

    }

    public function create(Request $request)
    {
        $categories = Category::getAll();
        $leafCategoryDTO = new LeafCategoryDTOCollection($categories);
        $data = [
            'leafCategories' => $leafCategoryDTO->getCollection()
        ];
        return view("admin/connectors/create.view.php", $data);
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