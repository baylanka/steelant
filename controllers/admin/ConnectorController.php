<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\ConnectorDTOCollection;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\filters\ConnectorFilter;
use helpers\pools\LanguagePool;
use helpers\repositories\ConnectorRepository;
use model\Category;

class ConnectorController extends BaseController
{
    public function index(Request $request)
    {
        $lang = LanguagePool::getByLabel($request->get('tableLang', 'de'))->getLabel();
        $search = $request->get('search', '');
        $filters = $request->get('filters', []);
        $publishedStatus = $request->get('published', 'none');
        $connectorsFilter = new ConnectorFilter($lang,$search, $filters,$publishedStatus);

        $connectors = $connectorsFilter->getResult();
        $connectorDTOCollection = ConnectorDTOCollection::getCollection($connectors, $lang,
            '  <i class="bi bi-arrow-right text-success"></i>  ');
        $data = [
            'heading' => "Connectors",
            'connectors' => $connectorDTOCollection,
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