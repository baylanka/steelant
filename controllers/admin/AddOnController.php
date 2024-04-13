<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\AddOnDTO;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\mappers\AddOnStoreRequestMapper;
use helpers\mappers\AnotherMapper;
use helpers\mappers\ConnectorStoreRequestMapper;
use helpers\mappers\StoreAddOnRequestMapper;
use helpers\mappers\TestMapper;
use helpers\middlewares\UserMiddleware;
use helpers\pools\LanguagePool;
use helpers\repositories\TemplateRepository;
use helpers\utilities\ResponseUtility;
use helpers\validators\AddOnContentStoreRequestValidator;
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
        $lang = LanguagePool::getByLabel($request->get('tableLang', 'de'))->getLabel();
        $categories = Category::getAll();
        $leafCategoryDTOCollection = LeafCategoryDTOCollection::getCollection($categories);
        $data = [
            'leafCategories' => $leafCategoryDTOCollection,
            'tableLang' => $lang,
            'categoryId' => $request->get('categoryId'),
            'templates' => TemplateRepository::getAllAddOn(),
        ];
        return view("admin/add-on-content/create.view.php", $data);
    }

    public function store(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            AddOnContentStoreRequestValidator::validate($request);
            $addOnContent = AddOnStoreRequestMapper::getModel($request);
            $addOnContent->save();
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => new AddOnDTO($addOnContent),
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