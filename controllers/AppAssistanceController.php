<?php

namespace controllers;

use app\AssistCLI;
use app\Request;
use controllers\BaseController;

class AppAssistanceController extends BaseController
{
    public function migrate(Request $request)
    {
        AssistCLI::migrate();
        parent::response("Successfully migrated!");
    }
}