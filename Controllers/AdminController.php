<?php

namespace app\Controllers;

use app\core\Controller;
use app\core\Helper;
use app\core\Session;
use app\core\Validator;
use app\models\AdminsModel;
use app\models\DoctorantModel;
use app\models\EnseignantModel;

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
        if(!$this->session->hasSession('token')) {
            $this->redirect('/admin/login');
        }
        $nbrOfDoctorant = DoctorantModel::getCountTable();
        $nbrOfEnseignant = EnseignantModel::getCountTable();
        $params = [
            "nbrOfDoctorant" => $nbrOfDoctorant,
            "nbrOfEnseignant"=> $nbrOfEnseignant,
        ];
        return $this->renderAdmin('layout/contentWraper', $params);
    }

    public function registerPage()
    {
        if(isset($_SESSION['token']['admin'])) {
            $this->redirect('/admin/dashboard');
        }
        return $this->renderEmpty('admin/register', []);
    }

    public function registerAdmin()
    {
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
                $avatar = "avatar.png";
                $adminModel->setNom($data['nom']);
                $adminModel->setPrenom($data['prenom']);
                $adminModel->setEmail($data['email']);
                $adminModel->setPassword($pass);
                $adminModel->setTel("");
                $adminModel->setAvatar($avatar);

                $arr = array(
                    'email' => $data['email']
                );


                if($result = AdminsModel::getByAllColumns($arr))
                {
                    $errors[]   = "*this email already exists";
                    $session->setFlash("error", $errors);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }else
                    if($adminModel->register())
                    {
                        $result = AdminsModel::getByAllColumns($arr);
                        $_SESSION['token']['admin'] = $result[0];
                        $session->setFlash("success","admin registered with success");
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }

            }else{
                $errors[]   = "two passwords must be identical";
                $session->setFlash("error", $errors);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }else{
            $session->setFlash("error", $errors);
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }
    }

    public function loginPage()
    {
        if(isset($_SESSION['token']['admin'])){
            $this->redirect('/admin/dashboard');
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

                    $_SESSION['token']['admin'] = $result[0];
                    $this->redirect('/admin/dashboard');
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
        return $this->renderAdmin('profile', $_SESSION['token']['admin']);
    }

    public function updateProfile()
    {
        $session = new Session();
        $validator = new validator();
        $tel = $_POST['tel'] ?? '';
        unset($_POST['tel']);
        $data = $validator->sanitize($_POST);
        $errors = $validator->require($data);
        $adminModel = new AdminsModel();

        if (isset($_FILES["pictures"]["error"][1]))
            $errors['uploads'][] = "* You can't upload multiple files";

        if(empty($errors)){
            $upload = $this->UploadFile('users', $data['nom']);
            $errors['uploads'] = $upload['errors'];

            if(empty($errors['uploads'])){

                $avatar = $upload['uploaded'][0] ?? $_SESSION['token']['admin']['avatar'];
                $pass   = $_SESSION['token']['admin']['password'];
                $id     = $_SESSION['token']['admin']['id'];

                $adminModel->setId($id);
                $adminModel->setNom($data['nom']);
                $adminModel->setPrenom($data['prenom']);
                $adminModel->setEmail($data['email']);
                $adminModel->setPassword($pass);
                $adminModel->setTel($tel);
                $adminModel->setAvatar($avatar);

                if($adminModel->update()){
                    $_SESSION['token']['admin']['nom']    = $data['nom'];
                    $_SESSION['token']['admin']['prenom'] = $data['prenom'];
                    $_SESSION['token']['admin']['email']  = $data['email'];
                    $_SESSION['token']['admin']['tel']    = $tel;
                    $_SESSION['token']['admin']['avatar'] = $avatar;

                    $this->redirect('/admin/profile');
                }
                return;

            }

        }
        
        $session->setFlash("errors", $errors);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }

    public function deletePicture(){
        $data = array(
            'avatar' => 'avatar.png'
        );
        if (AdminsModel::UpdateColumns($_SESSION['token']['admin']['id'], $data)){
            $_SESSION['token']['admin']['avatar'] = 'avatar.png';
            $this->redirect('/admin/profile');
        }

    }

    public function logoutHandler()
    {
        unset($_SESSION['token']['admin']);
        $this->redirect("/admin/login");
    }


}