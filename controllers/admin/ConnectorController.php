<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\ConnectorDTO;
use helpers\dto\ConnectorDTOCollection;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\filters\ConnectorFilter;
use helpers\mappers\ConnectorStoreRequestMapper;
use helpers\mappers\ConnectorUpdateRequestMapper;
use helpers\middlewares\UserMiddleware;
use helpers\pools\LanguagePool;
use helpers\repositories\TemplateRepository;
use helpers\services\ConnectorService;
use helpers\services\TemplateService;
use helpers\translate\Translate;
use helpers\utilities\ResponseUtility;
use helpers\validators\ConnectorStoreRequestValidator;
use helpers\validators\ConnectorUpdateRequestValidator;
use model\Category;
use model\Connector;
use model\Template;

class ConnectorController extends BaseController
{
    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdminOrDeveloper();
    }
    public function index(Request $request)
    {
        $lang = LanguagePool::getByLabel($request->get('tableLang', 'en-us'))->getLabel();
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
        $leafCategoryDTOCollection = LeafCategoryDTOCollection::getCollection($categories);
        $data = [
            'leafCategories' => $leafCategoryDTOCollection,
            'tableLang' => $lang,
            'categoryId' => $request->get('categoryId'),
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
            $connectorDTO = ConnectorService::getDTOById($connector->id, $lang, $separator);
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
        $connectorId = $request->get('id');
        $data = [
            'leafCategories' => LeafCategoryDTOCollection::getCollection($categories),
            'tableLang' => $lang,
            'connector' => ConnectorService::getDTOById($connectorId, $lang),
            'templates' => TemplateRepository::getAllConnectors(),
            'templatePreviews' => TemplateService::getAllLangConnectorTemplates($connectorId),
            'fixed_category' => $request->get('fixed_category', 0),
        ];

        return view("admin/connectors/edit.view.php", $data);
    }

    public function update(Request $request)
    {
        $lang = LanguagePool::getByLabel($request->get('tableLang', 'de'))->getLabel();
        $separator = '  <i class="bi bi-arrow-right text-success"></i>  ';
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            ConnectorUpdateRequestValidator::validate($request);
            $connector = ConnectorUpdateRequestMapper::getModel($request);
            $connector->update();
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => ConnectorService::getDTOById($connector->id, $lang, $separator),
                'templatePreviews' => TemplateService::getAllLangConnectorTemplates($connector->id),
                'downloadableContents' => TemplateService::getDonwloadableFileTabTemplateByConnectorId($connector->id, $lang)
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }

    public function destroy(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try {
            $connectorId = $request->get('id');
            $db->beginTransaction();
            $connector = Connector::getById($connectorId);
            $connector->delete();
            $db->commit();
            parent::response("successfully deleted");
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }


    public function showAllTemplates(Request $request)
    {
        $connectorId = $request->get('id');
        $templatePreviews = TemplateService::getAllLangConnectorTemplates($connectorId, Template::MODE_VIEW);
        $data = [
            'templates' => $templatePreviews
        ];
        return view("admin/connectors/connector_templates.view.php", $data);
    }

}