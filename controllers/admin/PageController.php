<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\middlewares\UserMiddleware;
use helpers\pools\LanguagePool;
use helpers\services\CategoryService;
use model\Category;

class PageController extends BaseController
{
    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdmin();
    }
    public function index(Request $request)
    {
        $categories = Category::getAll();
        $leafCategoryDTOCollection =  LeafCategoryDTOCollection::getCollection($categories,'de',
            ' <i class="bi bi-arrow-right text-success"></i> ');
        $data = [
            'heading' => "Pages",
            'leaf_categories' => $leafCategoryDTOCollection
        ];
        return view("admin/pages/index.view.php", $data);

    }


    public function show(Request $request)
    {
        $lang = LanguagePool::GERMANY()->getLabel();
        $categoryId = $request->get('id');
        $separator = '  <i class="bi bi-arrow-right text-success"></i>  ';
        $headingArray  = CategoryService::getCategoryNameTreeByLeafCategoryId($categoryId);
        $heading  = implode($separator, $headingArray[$lang]);
        $data = [
            'heading' => $heading
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