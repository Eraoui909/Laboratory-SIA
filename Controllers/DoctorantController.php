<?php


namespace app\Controllers;


use app\core\Controller;
use app\core\Helper;
use app\core\Session;
use app\core\Validator;
use app\models\DoctorantModel;
use app\models\EnseignantModel;

class DoctorantController extends Controller
{
    use Helper;
    public function doctorantPage()
    {
        global $GLOBAL_DIR ;

        if(!isset($_SESSION['token']['admin'])){
            $this->redirect($GLOBAL_DIR.'/admin/login');
        }
        $data = EnseignantModel::getByQuery("SELECT * FROM enseignant WHERE specialite='doc'");
        return $this->renderAdmin('doctorant', $data);
    }

    /*
    public function ajouterDoctorant()
    {
        $errors     = array();
        $session    = new Session();
        $valdator   = new Validator();

        $data                = $valdator->sanitize($_POST);
        $errors['error']     = $valdator->require($data);

        if(empty($errors['error']))
        {
            $doctorant  = new EnseignantModel();

            $doctorant->setNom($data['nom']);
            $doctorant->setPrenom($data['prenom']);
            $doctorant->setEmail($data['email']);
            $doctorant->setPassword($this->hash_undecrypted_data($data['password']));
            $doctorant->setTel("");
            $doctorant->setAvatar("avatar.png");

            $doctorant->register();

            $success = json_encode("success");
            echo $success;

        }else{
            $errors = json_encode($errors);
            echo  $errors;
        }

        exit();
    }

    public function modifierDoctorant()
    {
        $errors     = array();
        $validator  = new Validator();
        $data       = $validator->sanitize($_POST);

        if(empty($data['password']))
            unset($data['password']);
        else
            $data['password'] = $this->hash_undecrypted_data($data['password']);

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

    public function deleteDoctorant()
    {
//        var_dump($_POST);
        if(EnseignantModel::delete($_POST['id']))
        {
            echo json_encode("success");
        }else{
            echo json_encode("error");
        }
    }
    */

}