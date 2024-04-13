<?php

namespace controllers;

use app\Request;
use helpers\services\CategoryService;
use helpers\services\RouterService;
use model\Category;
use model\Connector;



class TestController extends BaseController
{
    public function test(Request $request)
    {
        dd(RouterService::getCategoryPageRoute(455));
    }
}