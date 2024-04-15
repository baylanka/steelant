<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\repositories\CategoryContentRepository;
use helpers\middlewares\UserMiddleware;
use helpers\pools\LanguagePool;
use helpers\services\CategoryService;
use helpers\translate\Translate;
use model\Category;

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