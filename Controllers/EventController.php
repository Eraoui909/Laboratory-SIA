<?php


namespace app\Controllers;


use app\core\Controller;
use app\core\Helper;
use app\core\Session;
use app\core\Validator;
use app\models\EventModel;

class EventController extends Controller
{
    use Helper;
    public function addEvent()
    {
        $errors     = array();
        $session    = new Session();
        $valdator   = new Validator();

        $data                = $valdator->sanitize($_POST);
        $errors['error']     = $valdator->require($data);

        $picture = $this->UploadFile('events',md5($data['title']));
        $errors['uploads'] = $picture['errors'];
        //print_r($picture['uploaded'][0]);exit();

        if(empty($errors['error']))
        {
            $event  = new EventModel();

            $event->setTitle($data['title']);
            $event->setLieu($data['lieu']);
            $event->setDescription($data['description']);
            @$event->setPicture($picture['uploaded'][0]??"avatar.PNG");
            $event->setDate($data['date']);
            $event->setTimeEvent($data['time']);

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
        if(isset($_POST['eventID'])){
            $lastPic = dirname(__DIR__) . "/public/Storage/uploads/events/".$_POST['eventPic'];
            chmod(dirname(__DIR__) . "/public/Storage/uploads/events" ,777);
            if($lastPic !== "default.png"){
                @chown($lastPic,465);
                @unlink($lastPic);
            }
        }
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

        $pic = null;

        $session = new Session();
        $validator = new validator();
        $data = $validator->sanitize($_POST);
        $errors = $validator->require($data);


        $eventModel = new EventModel();

        if(!empty($_FILES['pictures']['name'][0])){

            $lastPic = dirname(__DIR__) . "/public/Storage/uploads/events/".$_POST['picture'];
            chmod(dirname(__DIR__) . "/public/Storage/uploads/events" ,777);
            if($lastPic !== "default.png"){
                @chown($lastPic,465);
                @unlink($lastPic);
            }
            $pic = $this->UploadFile('events',md5($data['title']));
        }


        if(empty($errors)){

            $eventModel->setEventID($data['id']);
            $eventModel->setTitle($data['title']);
            $eventModel->setLieu($data['lieu']);
            $eventModel->setDateEvent($data['date']);
            $eventModel->setTimeEvent($data['date']);
            if($pic === null){
                $eventModel->setPicture($data['picture']);
            }else{
                $eventModel->setPicture($pic['uploaded'][0]);
            }
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