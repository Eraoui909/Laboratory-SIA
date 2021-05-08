<?php


namespace app\Controllers;


use app\core\Session;
use app\core\Validator;
use app\models\TeamModel;

class TeamController
{

    public function addTeam()
    {
        $errors     = array();
        $valdator   = new Validator();

        $data       = $valdator->sanitize($_POST);
        $errors['error']     = $valdator->require($data);

        if(empty($errors['error']))
        {
            $ensignant  = new TeamModel();
            $ensignant->setThematic($data['thematic']);

            $ensignant->register();

            echo json_encode("success");

        }else{
            $errors = json_encode($errors);
            echo  $errors;
        }
    }

    public function deleteTeam()
    {
        if(TeamModel::delete($_POST['equipeID']))
        {
            echo json_encode("deleted");
        }else{
            echo json_encode("error");
        }
    }

    public function addTeacherToTeam()
    {
        $errors     = array();
        $valdator   = new Validator();

        $data       = $valdator->sanitize($_POST);

        $enseignant = $data['enseignant'] ?? '';

        if ($enseignant == '')
            $errors['error'][] = '*please choose one teacher';


        $ens = TeamModel::getTeachers($data['equipeID']);

        if (!empty($ens)) {
            foreach ($ens as $enseign) {
                if ($enseign['id'] == $enseignant) {
                    $errors['error'][] = '*this teacher already exist in the team';
                    break;
                }
            }
        }

        if(empty($errors['error']))
        {
            if (TeamModel::addTeacher($enseignant, $data['equipeID'])) {
                echo json_encode("success");
            }
        }else{
            $errors = json_encode(array_values($errors['error']));
            echo  $errors;
        }
    }

    public function deleteTeacherFromTeam()
    {
        $exist = false;
        $errors     = array();
        $valdator   = new Validator();

        $data       = $valdator->sanitize($_POST);

        $enseignant = $data['enseignant'] ?? '';

        if ($enseignant == '')
            $errors['error'][] = '*please choose one teacher';


        $ens = TeamModel::getTeachers($data['equipeID']);

        if (empty($ens))
            $errors['error'][] = 'this teacher doesn\'t exist in the team';

        if (!empty($ens) && empty($errors['error'])) {

            foreach ($ens as $enseign) {
                if ($enseign['id'] == $enseignant) {
                    $exist = true;
                    break;
                }
            }
            if (!$exist)
                $errors['error'][] = 'this teacher doesn\'t exist in the team';
        }

        if(empty($errors['error']))
        {
            if (TeamModel::deleteTeacher($enseignant, $data['equipeID'])) {
                echo json_encode("success");
            }
        }else{
            $errors = json_encode(array_values($errors['error']));
            echo  $errors;
        }
    }
}