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
        $params     = array();
        if(empty($data['password']))
        {
            $errors['error']   = $validator->require(["prenom" => $data['prenom'],"nom" =>$data['nom'],"email" =>$data['email']]);
            if(empty($errors['error']))
            {
                $params = [
                    "prenom"=> $data['prenom'],
                    "nom"   => $data['nom'],
                    "email" => $data['email'],
                ];
            }
        }else{
            $errors['error']   = $validator->require($data);
            if(empty($errors['error']))
            {
                $params = [
                    "prenom"=> $data['prenom'],
                    "nom"   => $data['nom'],
                    "email" => $data['email'],
                    "password" => $this->hash_undecrypted_data($data['password']),
                ];
            }
        }


        if(!empty($errors['error']))
        {
            $errors = json_encode($errors);
            echo  $errors;
        }else{

            if(EnseignantModel::UpdateColumns($data['id'],$params))
            {
                echo json_encode("succes");
            }else{
                echo json_encode("error");
            };
        }

    }

    public function deleteEnseignant()
    {
        $query = "DELETE FROM enseignant WHERE id=".$_POST['id'];
        if(EnseignantModel::executeQuery($query))
        {
            echo json_encode("success");
        }else{
            echo json_encode("error");
        }
    }
}