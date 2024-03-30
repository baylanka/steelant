<?php

namespace controllers\user;

use app\Request;
use helpers\middlewears\UserMiddlewear;
use helpers\services\CategoryService;
use model\Category;

class HomeController
{

    public function connectors(Request $request)
    {
        $categories = Category::getAll();
        $arrangedCategories = CategoryService::organizingCategoriesTreeView($categories);
        $data = [
            'heading' => "Category",
            'categories' => $arrangedCategories,
        ];
        return view("user/connectors.view.php", $data);
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

        UserMiddlewear::isLoggedIn();
        $data = [];
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