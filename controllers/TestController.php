<?php

namespace controllers;

use app\Request;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\services\CategoryService;
use model\Category;
use model\Connector;



class TestController extends BaseController
{
    public function test(Request $request)
    {
        $categories = Category::getAll();
        $categoryCollection = new LeafCategoryDTOCollection($categories);
        print_r($categoryCollection);

    }
}