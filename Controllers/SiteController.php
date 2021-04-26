<?php

namespace app\Controllers;
use app\core\Controller;


use app\core\Application;
use app\core\Request;
use app\core\Router;
use app\models\AdminsModel;

class SiteController extends Controller
{

    public function homePage()
    {

    }


    public function contactPage()
    {
        $params = [
            "title" => "Contact page",
        ];

        return $this->render('contact', $params);
    }

    public function handleContact(Request $request)
    {
        $result = "";
        echo "<pre>";
        print_r($request->all());
        echo "</pre>";
        $admin = new AdminsModel();
        //$admin->setUsername("hamza eraoui");
        //$admin->setPassword("password");
        $result = $admin->deleteAll();
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}