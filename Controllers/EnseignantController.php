<?php


namespace app\Controllers;


use app\core\Controller;
use app\core\Helper;
use app\core\Session;
use app\core\Validator;
use app\models\EnseignantModel;

class EnseignantController extends Controller
{
    use Helper;
    public function enseignantPage()
    {
        $data = EnseignantModel::getAll();
        return $this->renderAdmin('enseignant', $data);
    }

    public function ajouterEnseignant()
    {
        $errors     = array();
        $session    = new Session();
        $valdator   = new Validator();

        $data       = $valdator->sanitize($_POST);
        $errors['error']     = $valdator->require($data);

        if(empty($errors['error']))
        {

            $ensignant  = new EnseignantModel();
            $ensignant->setNom($data['nom']);
            $ensignant->setPrenom($data['prenom']);
            $ensignant->setEmail($data['email']);
            $ensignant->setPassword($this->hash_undecrypted_data($data['password']));
            $ensignant->setTel("");
            $ensignant->setAvatar("avatar.png");

            $ensignant->register();

            $success = json_encode("success");
            echo $success;

        }else{
            $errors = json_encode($errors);
            echo  $errors;
        }

        exit();
    }

    public function modifierEnseignant()
    {
        $errors     = array();
        $validator  = new Validator();
        $data       = $validator->sanitize($_POST);

        if(empty($data['password']))
            unset($data['password']);

        $errors     = $validator->require($data);

        if(!empty($errors))
        {
            $errors = json_encode($errors);
            echo  $errors;
        }else{

            if(EnseignantModel::UpdateColumns($data['id'], $data))
            {
                echo json_encode("succes");
            }else{
                echo json_encode("error");
            };
        }

    }

    public function deleteEnseignant()
    {

        if(EnseignantModel::delete($_POST['id']))
        {
            echo json_encode("deleted");
        }else{
            echo json_encode("error");
        }
    }

    public function teacherProfile()
    {
        $teacher = EnseignantModel::getByPk(0);
        $_SESSION['teacher_auth'] = $teacher[0];
        /*
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        */
        return $this->render('/teachers/profile',$_SESSION['teacher_auth']);
    }

    public function updateProfile()
    {
        $session = new Session();
        $validator = new validator();
        $tel = $_POST['tel'] ?? '';
        unset($_POST['tel']);
        $data = $validator->sanitize($_POST);
        $errors = $validator->require($data);
        $teacherModel = new EnseignantModel();

        if (isset($_FILES["pictures"]["error"][1])){
            $errors['uploads'][] = "* You can't upload multiple files";
        }

        if(empty($errors)){
            $upload = $this->UploadFile('users', $data['nom']);
            $errors['uploads'] = $upload['errors'];


            if(empty($errors['uploads'])){

                $avatar = $upload['uploaded'][0] ?? $_SESSION['teacher_auth']['avatar'];
                $pass   = $_SESSION['teacher_auth']['password'];
                $id     = $_SESSION['teacher_auth']['id'];

                $teacherModel->setId($id);
                $teacherModel->setNom($data['nom']);
                $teacherModel->setPrenom($data['prenom']);
                $teacherModel->setEmail($data['email']);
                $teacherModel->setPassword($pass);
                $teacherModel->setTel($tel);
                $teacherModel->setAvatar($avatar);

                if($teacherModel->update()){
                    $_SESSION['teacher_auth']['nom']    = $data['nom'];
                    $_SESSION['teacher_auth']['prenom'] = $data['prenom'];
                    $_SESSION['teacher_auth']['email']  = $data['email'];
                    $_SESSION['teacher_auth']['tel']    = $tel;
                    $_SESSION['teacher_auth']['avatar'] = $avatar;

                    $this->redirect('/teacher/profile');
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
        if (EnseignantModel::UpdateColumns($_SESSION['teacher_auth']['id'], $data)){
            $_SESSION['teacher_auth']['avatar'] = 'avatar.png';
            $this->redirect('/teacher/profile');
        }

    }

    public function teacherCV()
    {
        return $this->render('/teachers/cv',$_SESSION['teacher_auth']);
    }

    public function teacherCVDownoald()
    {

    }

    public function cvToPdf()
    {
        return $this->renderEmpty('/teachers/cvToPDF',$_SESSION['teacher_auth']);
    }

}