<?php


namespace app\Controllers;


use app\core\Controller;
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
        $_SESSION['admin_registered'] = array();
        if (isset($_POST['email']) ) {
            $validator = new Validator();
            $errors = $validator->require($_POST);
            if(empty($errors))
            {
                $admin = new AdminsModel();
                $admin->setUsername($_POST['email']);
                $admin->setEmail($_POST['email']);
                $admin->setPassword($_POST['password']);
                if($admin->register()) {
                    $_SESSION['admin_registered']['success_msg'] = $lang["admin_registred_success"];
                }else{
                    $_SESSION['admin_registered']['error_msg'] = $lang["admin_registred_error"];
                }
            }else{
                $_SESSION['admin_registered']['error_msg'] = $errors;
            }

            header('Location:' . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['admin_registered']['error_msg'] = "must be passed by register form";
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }

}