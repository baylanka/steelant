<?php
namespace controllers;

use app\Request;
use controllers\BaseController;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        global $env;
        $data = ["name"=>$env['APP_NAME']];
        return view("home.view.php", $data);
    }
}