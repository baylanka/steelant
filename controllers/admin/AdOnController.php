<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\AdOnDTOCollection;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\mappers\AdOnStoreRequestMapper;
use helpers\middlewares\UserMiddleware;
use helpers\pools\LanguagePool;
use helpers\repositories\TemplateRepository;
use helpers\services\AdOnService;
use helpers\services\TemplateService;
use helpers\translate\Translate;
use helpers\utilities\ResponseUtility;
use helpers\validators\AddOnContentStoreRequestValidator;
use model\AdOnContent;
use model\Category;
use model\Template;

class AdOnController extends BaseController
{
    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdminOrDeveloper();
    }
    public function index(Request $request)
    {
        $lang = Translate::getLang();
        $separate = '  <i class="bi bi-arrow-right text-success"></i>  ';
        $adOnContents = AdOnContent::getAll();
        $adOnDTOCollection = AdOnDTOCollection::getCollection($adOnContents, $lang, $separate);
        $data = [
            'heading' => "Ad-on",
            'adOnContents' => $adOnDTOCollection
        ];
        return view("admin/ad-on-content/index.view.php", $data);

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
            'templates' => TemplateRepository::getAllAddOn(),
        ];
        return view("admin/ad-on-content/create.view.php", $data);
    }

    public function store(Request $request)
    {
        global $container;
        $lang = Translate::getLang();
        $separate = '  <i class="bi bi-arrow-right text-success"></i>  ';
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            AddOnContentStoreRequestValidator::validate($request);
            $addOnContent = AdOnStoreRequestMapper::getModel($request);
            $addOnContent->save();
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => AdOnService::getDTOById($addOnContent->id, $lang, $separate),
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

    public function showAllTemplates(Request $request)
    {
        $adOnContentId = $request->get('id');
        $templatePreviews = TemplateService::getAllLangAdOnTemplates($adOnContentId, Template::MODE_VIEW);
        $data = [
            'templates' => $templatePreviews
        ];
        return view("admin/connectors/connector_templates.view.php", $data);
    }
}