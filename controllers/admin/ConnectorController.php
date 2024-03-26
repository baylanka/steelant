<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\ConnectorDTO;
use helpers\dto\ConnectorDTOCollection;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\filters\ConnectorFilter;
use helpers\mappers\ConnectorStoreRequestMapper;
use helpers\pools\LanguagePool;
use helpers\repositories\ConnectorRepository;
use helpers\utilities\ResponseUtility;
use helpers\validators\ConnectorStoreRequestValidator;
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
        return view("admin/connectors/short_create.view.php", $data);
    }

    public function store(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            ConnectorStoreRequestValidator::validate($request);
            $connector = ConnectorStoreRequestMapper::getModel($request);
            $connector->save();
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
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