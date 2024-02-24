<?php
namespace controllers\user;

use app\Request;
use controllers\BaseController;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        global $env;
        $data = ["name"=>$env['APP_NAME']];
        return view("user/home.view.php", $data);
    }
}