<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\repositories\CategoryContentRepository;
use helpers\middlewares\UserMiddleware;
use helpers\pools\LanguagePool;
use helpers\repositories\RelevantPageRepository;
use helpers\services\CategoryService;
use helpers\translate\Translate;
use helpers\utilities\ResponseUtility;
use model\Category;
use model\RelevantPage;

class PageController extends BaseController
{
    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdminOrDeveloper();
    }
    public function index(Request $request)
    {
        $lang = Translate::getLang();
        $categories = Category::getAll();
        $leafCategoryDTOCollection =  LeafCategoryDTOCollection::getCollection($categories,$lang,
            ' <i class="bi bi-arrow-right text-success"></i> ');
        $data = [
            'heading' => "Pages",
            'leaf_categories' => $leafCategoryDTOCollection
        ];
        return view("admin/pages/index.view.php", $data);

    }

    public function showUpdateRelevantPages(Request $request)
    {
        $separator = '  <i class="bi bi-arrow-right text-success"></i>  ';
        $categoryId = $request->get('id');
        $lang = LanguagePool::ENGLISH()->getLabel();
        $categories = Category::getAllAvoidById($categoryId);
        $leafCategoryDTOCollection =  LeafCategoryDTOCollection::getCollection($categories,$lang,$separator);
        $pages = RelevantPage::getAllBy(['category_id'=>$categoryId]);

        $categoryNameAsHeading = CategoryService::getCategoryNameTreeStrByLeafCategoryId($categoryId, $lang, ' > ');
        $contents = CategoryContentRepository::getAllContentsInDisplayOrder($categoryId, $lang);
        $data = [
            'heading' => $categoryNameAsHeading,
            'contents' => $contents,
            'categoryId' => $categoryId,
            'leaf_categories' => $leafCategoryDTOCollection,
            'pages' => $pages
        ];
        return view("admin/pages/relevant_pages.view.php", $data);
    }

    public function updateRelevantPages(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');

        try{
            $db->beginTransaction();
            $categoryId = $request->get('id');
            $pageIds = $request->get('relevant_pages', []);
            $titleJsons = $request->get('title_json', []);
            $descriptionJsons = $request->get('description_json', []);
            RelevantPageRepository::updateRelevantPages($categoryId, $pageIds,$titleJsons, $descriptionJsons);
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully updated",
            ]);
        }catch (\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }


    public function show(Request $request)
    {
        $lang = Translate::getLang();
        $categoryId = $request->get('id');
        $separator = '  <i class="bi bi-arrow-right text-success"></i>  ';
        $categoryNameAsHeading = CategoryService::getCategoryNameTreeStrByLeafCategoryId($categoryId, $lang, $separator);
        $contents = CategoryContentRepository::getAllContentsInDisplayOrder($categoryId, $lang);
        $data = [
            'heading' => $categoryNameAsHeading,
            'contents' => $contents,
            'categoryId' => $categoryId,
        ];
        return view("admin/pages/page.view.php", $data);

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