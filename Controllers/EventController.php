<?php


namespace app\Controllers;


use app\core\Controller;
use app\core\Session;
use app\core\Validator;
use app\models\EventModel;

class EventController extends Controller
{
    public function addEvent()
    {
        $errors     = array();
        $session    = new Session();
        $valdator   = new Validator();

        $data                = $valdator->sanitize($_POST);
        $errors['error']     = $valdator->require($data);

        if(empty($errors['error']))
        {
            $event  = new EventModel();

            $event->setTitle($data['title']);
            $event->setLieu($data['lieu']);
            $event->setDescription($data['description']);
            $event->setPicture("default.png");

            $event->register();

            $success = json_encode("success");
            echo $success;

        }else{
            $errors = json_encode($errors);
            echo  $errors;
        }

        exit();
    }

    public function deleteEvent()
    {
        if(EventModel::delete($_POST['eventID']))
        {
            echo json_encode("deleted");
        }else{
            echo json_encode("error");
        }
    }

    public function modifyEvent()
    {
        global $GLOBAL_DIR ;

        $session = new Session();
        $validator = new validator();

        $data = $validator->sanitize($_POST);
        $errors = $validator->require($data);

        $eventModel = new EventModel();

        if(empty($errors)){

            $eventModel->setEventID($data['id']);
            $eventModel->setTitle($data['title']);
            $eventModel->setLieu($data['lieu']);
            $eventModel->setDate($data['date']);
            $eventModel->setPicture($data['picture']);
            $eventModel->setDescription($data['description']);

            if($eventModel->update()){
                echo json_encode("success");
            }else{
                echo json_encode("error");
            }

        }else{
            echo json_encode($errors);
        }

    }
}