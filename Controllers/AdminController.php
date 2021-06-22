<?php

namespace app\Controllers;

use app\core\Controller;
use app\core\Helper;
use app\core\Session;
use app\core\Validator;
use app\models\AdminsModel;
use app\models\ArticleModel;
use app\models\ContactModel;
use app\models\DoctorantModel;
use app\models\EnseignantModel;
use app\models\EventModel;
use app\models\TeamModel;

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
        global $GLOBAL_DIR ;

        if(!isset($_SESSION['token']['admin'])) {
            $this->redirect($GLOBAL_DIR.'/admin/login');
        }
        $nbrOfDoctorant     = EnseignantModel::getCountTable("WHERE specialite='doc'");
        $nbrOfEnseignant    = EnseignantModel::getCountTable("WHERE specialite='ens'");
        $nbrOfArticles      = ArticleModel::getCountTable();
        $nbrMsgNotReadable  = ContactModel::getCountTable("WHERE readable=0");
        $params = [
            "nbrOfDoctorant"    => $nbrOfDoctorant,
            "nbrOfEnseignant"   => $nbrOfEnseignant,
            "nbrOfArticles"     => $nbrOfArticles,
            "nbrMsgNotReadable" => $nbrMsgNotReadable,
        ];
        return $this->renderAdmin('layout/contentWraper', $params);
    }

    public function registerPage()
    {
        global $GLOBAL_DIR ;
        if(isset($_SESSION['token']['admin'])) {
            $this->redirect($GLOBAL_DIR.'/admin/dashboard');
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
        global $GLOBAL_DIR ;
        if(isset($_SESSION['token']['admin'])){
            $this->redirect($GLOBAL_DIR.'/admin/dashboard');
        }
        return $this->renderEmpty('admin/login',[]);
    }

    public function loginHandler()
    {

        global $GLOBAL_DIR ;

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
                    $this->redirect($GLOBAL_DIR.'/admin/dashboard');
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

    public function logoutHandler()
    {
        global $GLOBAL_DIR ;
        unset($_SESSION['token']['admin']);
        $this->redirect($GLOBAL_DIR."/admin/login");
    }

    public function profilePage()
    {
        global $GLOBAL_DIR ;
        if(!isset($_SESSION['token']['admin'])) {
            $this->redirect($GLOBAL_DIR.'/admin/login');
        }
        return $this->renderAdmin('profile', $_SESSION['token']['admin']);
    }

    public function updateProfile()
    {
        global $GLOBAL_DIR ;

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

                    $this->redirect($GLOBAL_DIR.'/admin/profile');
                }
                return;

            }

        }
        
        $session->setFlash("errors", $errors);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }

    public function deletePicture(){
        global $GLOBAL_DIR ;
        $data = array(
            'avatar' => 'avatar.png'
        );
        if (AdminsModel::UpdateColumns($_SESSION['token']['admin']['id'], $data)){
            $_SESSION['token']['admin']['avatar'] = 'avatar.png';
            $this->redirect($GLOBAL_DIR.'/admin/profile');
        }

    }

    public function TeamsPage()
    {
        global $GLOBAL_DIR ;

        if(!isset($_SESSION['token']['admin'])){
            $this->redirect($GLOBAL_DIR.'/admin/login');
        }

        $teachers = ['teacher' => ''];

        $data = TeamModel::getAll() ? TeamModel::getAll() : [];
        foreach ($data as $index => $equipe){

            foreach (TeamModel::getTeachers($equipe['equipeID']) as $teacher){
                $teachers['teacher'] .= $teacher['nom'] . ' ' . $teacher['prenom'] . ', ';

            }

            $teachers['teacher'] = trim($teachers['teacher'], ', ');

            $data[$index] = array_merge($data[$index], $teachers);
            $teachers = ['teacher' => ''];
        }


        $params['teams'] = $data;
        $params['ens']   = EnseignantModel::getAll() ? EnseignantModel::getAll() : [];


        return $this->renderAdmin('team', $params);
    }

    public function EventsPage()
    {
        global $GLOBAL_DIR ;

        if(!isset($_SESSION['token']['admin'])){
            $this->redirect($GLOBAL_DIR.'/admin/login');
        }

        $params['events'] = EventModel::getAll();
        return $this->renderAdmin('event', $params);
    }

    public function inboxPage(){
        global $GLOBAL_DIR ;

        if(!isset($_SESSION['token']['admin'])){
            $this->redirect($GLOBAL_DIR.'/admin/login');
        }
        $params['title'] = "inbox";
        $params['msgs'] = ContactModel::getAll("ORDER BY contactID DESC");
        return $this->renderAdmin('inbox', $params);
    }

    public function readMsgPage(){
        global $GLOBAL_DIR ;

        if(!isset($_SESSION['token']['admin'])){
            $this->redirect($GLOBAL_DIR.'/admin/login');
        }
        $msgID = (int) $_GET['m'];
        ContactModel::UpdateColumns($msgID,['readable' => 1]);
        $params['msg'] = ContactModel::getAll("WHERE contactID=".$msgID);
        $params['title'] = "message";
        return$this->renderAdmin('readMsg',$params);
    }

    public function deleteMsg(){
        $msgID = (int) $_POST['id'];
        if(ContactModel::deleteByPk($msgID)){
            echo json_encode("success");
        }else{
            echo json_encode("error");
        }

    }

}