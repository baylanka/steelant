<?php

namespace controllers\user;

use app\Request;
use helpers\middlewares\UserMiddleware;
use helpers\services\CategoryService;
use helpers\services\FavouriteService;
use helpers\services\OrderService;
use helpers\services\RouterService;
use helpers\translate\Translate;
use model\Category;
use model\ExceptionalRegion;

class HomeController
{

    public function home(Request $request)
    {
        $data = [
            'categoryGroups' => CategoryService::getCategoryGroupsByPageCol(),
            'lang' => Translate::getLang(),
            'exception_region' => new ExceptionalRegion()
        ];

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
        switch ($request->get("page")) {
            case 1:
                return view("user/gallery-1.view.php", $data);
            case 2:
                return view("user/gallery-2.view.php", $data);
            case 3:
                return view("user/gallery-3.view.php", $data);
            default:
                return view("user/gallery-1.view.php", $data);
        }
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
        $favourites = FavouriteService::getByUser($userId);
        $data = [
            "orders"=>$orders,
            "favourites"=>$favourites
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