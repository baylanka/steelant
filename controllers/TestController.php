<?php

namespace controllers;

use app\Request;
use helpers\services\ContentService;
use model\BaseModel;
use model\Connector;
use model\ContentTemplateMedia;


class TestController extends BaseController
{
    public function test(Request $request)
    {
        dd(ContentService::getLastUpdatedDate());
    }
}