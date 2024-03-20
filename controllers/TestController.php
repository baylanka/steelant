<?php

namespace controllers;

use app\Request;
use model\Connector;



class TestController extends BaseController
{
    public function test(Request $request)
    {
       $connector = Connector::getById(1);
       dd([
           $connector->getCategoryHierarchyByLanguage('en'),
           $connector->getCategoryHierarchyByLanguage('fr'),
       ]);

    }
}