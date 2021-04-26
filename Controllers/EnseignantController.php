<?php


namespace app\Controllers;


use app\core\Controller;
use app\models\EnseignantModel;

class EnseignantController extends Controller
{

    public function enseignantPage()
    {

        return $this->renderAdmin('enseignant',[]);
    }

}