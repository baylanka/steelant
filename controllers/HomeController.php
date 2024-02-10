<?php

use app\Request;

require_once "Controller.php";
class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        global $env;
        $data = ["name"=>$env['APP_NAME']];
        return require('views/home.view.php');
    }

}