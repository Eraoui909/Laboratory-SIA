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

    private $session;


    public function __construct()
    {
        $this->session = new Session();
    }


    public function dashboard()
    {
        //unset($_SESSION['auth']);
        $_SESSION['auth']="hamza";
        if(!$this->session->hasSession('auth')){
            return $this->loginPage();
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
            if($validator->passwordsIdentique($data['password'],$data['password-retype']))
            {
                $pass   = Helper::hash_undecrypted_data($data['password']);
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
            $session->setFlash("error",$errors);
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }
    }

    public function loginPage()
    {
        return $this->renderEmpty('admin/login',[]);
    }

    public function profilePage()
    {
        $adminModel = new AdminsModel();
        $admin = $adminModel->getByPk(4);


        return $this->renderAdmin('profile',$admin[0]);
    }

}