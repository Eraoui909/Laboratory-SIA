<?php

namespace app\Controllers;
use app\core\Controller;


use app\core\Application;
use app\core\Helper;
use app\core\Request;
use app\core\Router;
use app\core\Session;
use app\core\Validator;
use app\models\AdminsModel;
use app\models\EnseignantModel;

class SiteController extends Controller
{

    use Helper;
    private $session;


    public function __construct()
    {
        $this->session = new Session();
    }

    public function loginPage()
    {
        if (isset($_SESSION['token']))
            $this->redirect('/');
        $params = [
            "title" => "Login",
            "null" => true
        ];
        return $this->render('login', $params);
    }

    public function logoutPage()
    {
        unset($_SESSION['token']);
        $this->redirect('/');
    }

    public function Login()
    {
        $validator = new Validator();
        $session   = new Session();

        $data   = $validator->sanitize($_POST);
        $errors = $validator->require($data);

        if(empty($errors)){

            if ($result = EnseignantModel::login($data['email']))
            {

                if($this->verify_hashed_undecrypted_data($data['password'], $result[0]['password']))
                {
                    $_SESSION['token'] = $result[0];
                    $_SESSION['token']['groupID'] = $result[0]['ens'] ?? $result[0]['doc'];
                    $this->redirect('/');
                }
            }

            $session->setFlash("error", ['please check your mail and password and try again!']);
            $this->redirect($_SERVER['HTTP_REFERER']);

        }else{
            $session->setFlash("error", $errors);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
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