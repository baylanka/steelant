<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;

class ConnectorController extends BaseController
{
    public function index(Request $request)
    {
        global $env;
        $data = [
            'heading' => "Connectors"
        ];
        return view("admin/connectors/index.view.php", $data);

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