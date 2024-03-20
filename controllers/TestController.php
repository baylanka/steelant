<?php

namespace controllers;

use app\Request;
use controllers\BaseController;
use helpers\services\TemplateService;
use model\Template;


class TestController extends BaseController
{
    public function test(Request $request)
    {
        $data = [
            'template-1' => TemplateService::getTemplateByFillingDataById(9, [
                'title' => "MF-001",
                'paras' => [12,45,49],
            ]),
            'template-2' => TemplateService::getTemplateByFillingDataById(9, [
                'title' => "MBV-021",
                'paras' => ['ASDF', ':LKJ'],
            ])
        ];
        echo "<pre>";
        print_r($data);
    }
}