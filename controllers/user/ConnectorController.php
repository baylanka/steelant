<?php

namespace controllers\user;

use app\Request;
use controllers\BaseController;
use helpers\services\CategoryService;
use model\Category;

class ConnectorController extends BaseController
{
    public function index(Request $request)
    {
        if (!isset($_GET["id"])) {
            header('Location: ' . url("/"));
        }
        if($_GET["id"] < 1 || $_GET["id"] > 28 ){
            header('Location: ' . url("/"));
        }

        $data = [
        ];
        return view("user/connector.view.php", $data);
    }
}