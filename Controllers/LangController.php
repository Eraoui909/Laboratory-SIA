<?php


namespace app\Controllers;


use app\core\Controller;

class LangController extends Controller
{
    public function changeLangToEn()
    {
        $_SESSION['lang']   = "en";

        $previous = "http://localhost:8080/public/";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }
        header('Location: ' . $previous);
    }
    public function changeLangToFr()
    {
        $_SESSION['lang']   = "fr";

        $previous = "http://localhost:8080/public/";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }
       header('Location: ' . $previous);
    }
}