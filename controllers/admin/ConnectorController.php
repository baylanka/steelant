<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;

class ConnectorController extends BaseController
{
    public function index(Request $request)
    {
        global $env;
        $data = ["name"=>$env['APP_NAME']];
        return view("admin/connectors.view.php", $data);

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