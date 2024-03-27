<?php

namespace controllers\user;

use app\Request;
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


    public function sealant(Request $request)
    {
        $data = [];
        return view("user/sealant.view.php", $data);
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
        $data = [];
        return view("user/favourite.view.php", $data);
    }

}