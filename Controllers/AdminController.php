<?php


namespace app\Controllers;


use app\core\Controller;
use app\core\Helper;
use app\core\Session;
use app\core\Validator;
use app\models\AdminsModel;


class AdminController extends Controller
{

    public function registerPage()
    {
        //$_SESSION['admin_registered'] = array();
        return $this->render('admin/register', []);
    }

    public function registerAdmin()
    {
        global $lang;
        $session = new Session();
        if (isset($_POST['email']) ) {
            $validator = new Validator();
            $errors = $validator->require($_POST);
            if(empty($errors))
            {
                $hash_pass = Helper::hash_undecrypted_data($_POST['password']);
                $admin = new AdminsModel();
                $admin->setUsername($_POST['email']);
                $admin->setEmail($_POST['email']);
                $admin->setPassword($hash_pass);
                if($admin->register()) {
                    $session->setFlash("success_msg",$lang["admin_registred_success"]);
                }else{
                    $session->setFlash("error_msg",$lang["admin_registred_error"]);
                }
            }else{
                $session->setFlash("error_msg",$errors);
            }

            header('Location:' . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['admin_registered']['error_msg'] = "must be passed by register form";
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }

}