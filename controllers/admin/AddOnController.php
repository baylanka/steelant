<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;

class AddOnController extends BaseController
{
    public function index(Request $request)
    {
        global $env;
        $data = [
            'heading' => "Add-on"
        ];
        return view("admin/add-on-content/index.view.php", $data);

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