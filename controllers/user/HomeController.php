<?php

namespace controllers\user;

use app\Request;
use helpers\middlewares\UserMiddleware;
use helpers\services\CategoryService;
use helpers\services\OrderService;
use model\Category;

class HomeController
{

    public function home(Request $request)
    {
        $data = [];
        return view("user/home.view.php", $data);
    }


    public function downloads(Request $request)
    {
        $data = [];
        return view("user/downloads.view.php", $data);
    }

    public function gallery(Request $request)
    {
        $data = [];
        return view("user/gallery.view.php", $data);
    }


    public function contact(Request $request)
    {
        $data = [];
        return view("user/contact.view.php", $data);
    }

    public function login(Request $request)
    {
        $data = [];
        return view("user/login.view.php", $data);
    }

    public function register(Request $request)
    {
        $data = [];
        return view("user/register.view.php", $data);
    }


    public function favourite(Request $request)
    {

        $userId = $_SESSION["user"]->id;

        UserMiddleware::isLoggedIn();
        $orders = OrderService::getByUser($userId);
        $data = [
            "orders"=>$orders
        ];
        return view("user/favourite.view.php", $data);

    }


    public function about(Request $request)
    {
        $data = [];
        return view("user/about.view.php", $data);
    }
    public function imprint(Request $request)
    {
        $data = [];
        return view("user/imprint.view.php", $data);
    }


    public function privacy(Request $request)
    {
        $data = [];
        return view("user/privacy.view.php", $data);
    }

    public function newsLetter(Request $request)
    {
        $data = [];
        return view("user/newsletter.view.php", $data);
    }


    public function generalCondition(Request $request)
    {
        $data = [];
        return view("user/general_condition.view.php", $data);
    }

}