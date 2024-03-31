<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\ConnectorDTO;
use helpers\dto\ConnectorDTOCollection;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\filters\ConnectorFilter;
use helpers\mappers\ConnectorStoreRequestMapper;
use helpers\mappers\UpdateConnectorRequestMapper;
use helpers\pools\LanguagePool;
use helpers\repositories\TemplateRepository;
use helpers\services\ConnectorService;
use helpers\translate\Translate;
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
        $lang = LanguagePool::getByLabel($request->get('tableLang', 'de'))->getLabel();
        $categories = Category::getAll();
        $leafCategoryDTO = new LeafCategoryDTOCollection($categories);
        $data = [
            'leafCategories' => $leafCategoryDTO->getCollection(),
            'tableLang' => $lang
        ];
        return view("admin/connectors/short_create.view.php", $data);
    }

    public function store(Request $request)
    {
        $lang = LanguagePool::getByLabel($request->get('tableLang', 'de'))->getLabel();
        $separator = '  <i class="bi bi-arrow-right text-success"></i>  ';
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            ConnectorStoreRequestValidator::validate($request);
            $connector = ConnectorStoreRequestMapper::getModel($request);
            $connector->save();
            $db->commit();
            $connectorDTO = new ConnectorDTO($connector, $lang, $separator);
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => $connectorDTO
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }

    public function edit(Request $request)
    {
        $lang = Translate::getLang();
        $categories = Category::getAll();
        $leafCategoryDTO = new LeafCategoryDTOCollection($categories);
        $connectorId = $request->get('id');
        $connector = ConnectorService::getConnectorAssociatedData($connectorId);
        $connectorDTO = new ConnectorDTO($connector, $lang, '<');
        $templates = TemplateRepository::getAllConnectors();

//        $template = TemplateService::getTemplateByFillingDataById(8,$data);
        $data = [
            'leafCategories' => $leafCategoryDTO->getCollection(),
            'tableLang' => $lang,
            'connector' => $connectorDTO,
            'templates' => $templates,
//            'prev_connector_templates' => $connectorTemplates,
//            'show' => $template
        ];
        return view("admin/connectors/edit.view.php", $data);
    }

    public function update(Request $request)
    {
        try{
            $lang = LanguagePool::getByLabel($request->get('tableLang', 'de'))->getLabel();
            $separator = '  <i class="bi bi-arrow-right text-success"></i>  ';
            $connector = UpdateConnectorRequestMapper::getModel($request);
            $connector->update();
            $connectorDTO = new ConnectorDTO($connector, $lang, $separator);
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => $connectorDTO
            ]);
        }catch(\Exception $ex){
            parent::response($ex->getMessage(),[],422);
        }
    }

    public function destroy(Request $request)
    {

    }
}