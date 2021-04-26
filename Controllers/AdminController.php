<?php

namespace app\Controllers;

use app\core\Controller;
use app\core\Helper;
use app\core\Request;
use app\core\Session;
use app\core\Validator;
use app\models\AdminsModel;

class AdminController extends Controller
{
    use Helper;
    private $session;


    public function __construct()
    {
        $this->session = new Session();
    }

    public function dashboard()
    {
        if(!$this->session->hasSession('token')){
            $this->redirect('/public/admin/login');
        }

        return $this->renderAdmin('layout/contentWraper', []);
    }

    public function registerPage()
    {
        return $this->renderEmpty('admin/register', []);
    }

    public function registerAdmin()
    {
        global $lang;
        $errors = array();
        $session    = new Session();
        $validator  = new Validator();
        $adminModel = new AdminsModel();

        $data       = $validator->sanitize($_POST);
        $errors     = $validator->require($data);
        if(empty($errors))
        {
            if($validator->passwordsIdentique($data['password'], $data['password-retype']))
            {
                $pass   = $this->hash_undecrypted_data($data['password']);
                $avatar = "/Storage/Statics/images/avatar.png";
                $adminModel->setNom($data['nom']);
                $adminModel->setPrenom($data['prenom']);
                $adminModel->setEmail($data['email']);
                $adminModel->setPassword($pass);
                $adminModel->setTel("");
                $adminModel->setAvatar($avatar);
                if($adminModel->register())
                {
                    $session->setFlash("success","admin registered with success");
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }else{
                $errors[]   = "two passwords must be identical";
                $session->setFlash("error",$errors);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }else{
            $session->setFlash("error", $errors);
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }
    }

    public function loginPage()
    {
        if($this->session->hasSession('token')){
            $this->redirect('/public/admin/dashboard');
        }
        return $this->renderEmpty('admin/login',[]);
    }

    public function loginHandler()
    {
        $validator = new Validator();
        $session   = new Session();

        $data   = $validator->sanitize($_POST);
        $errors = $validator->require($data);

        if(empty($errors)){
            $arr = array(
                'email' => $data['email']
            );

            if ($result = AdminsModel::getByAllColumns($arr)){
                if($this->verify_hashed_undecrypted_data($data['password'], $result[0]['password'])){

                    $_SESSION['token'] = $result[0];
                    $this->redirect('/public/admin/dashboard');
                }else{

                    $session->setFlash("error", ['wrong password']);
                    $this->redirect($_SERVER['HTTP_REFERER']);
                }
            }

        }else{
            $session->setFlash("error", $errors);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }

    public function profilePage()
    {
        $adminModel = new AdminsModel();
        $admin = $adminModel->getByPk(1);


        return $this->renderAdmin('profile',$admin[0]);
    }



}