<?php

namespace app\Controllers;
use app\core\Controller;


use app\core\Application;
use app\core\Helper;
use app\core\Request;
use app\core\Router;
use app\core\Session;
use app\core\Validator;
use app\models\AdminsModel;
use app\models\ArticleModel;
use app\models\DoctorantModel;
use app\models\EnseignantModel;

class SiteController extends Controller
{

    use Helper;
    private $session;


    public function __construct()
    {
        $this->session = new Session();
    }

    public function homePage()
    {
        $data['title'] = "Home";
        $data['style'] = ['marquee.css', 'Home_Style.css'];
        $data['script'] = ['CokiesHandler.js','marquee.js', 'HomeScript.js', 'navbar.js'];
        return $this->render('home', $data);
    }

    public function loginPage()
    {
        if (isset($_SESSION['token']['ens']) || isset($_SESSION['token']['doc']))
            $this->redirect('/');

        $params = [
            "title" => "Login",
            "null" => true
        ];
        $params['style'] = ["login.css"];
        return $this->render('login', $params);
    }

    public function logoutPage()
    {
        unset($_SESSION['token']);
        $this->redirect('/');
    }

    public function Login()
    {
        $validator = new Validator();
        $session   = new Session();

        $data   = $validator->sanitize($_POST);
        $errors = $validator->require($data);


        if(empty($errors)){
            if ($result = EnseignantModel::login($data['email']))
            {
                if($this->verify_hashed_undecrypted_data($data['password'], $result[0]['password']))
                {
                    $groupID = $result[0]['ens'] ?? $result[0]['doc'];
                    $_SESSION['token'][$groupID] = $result[0];
                    $this->redirect('/');
                }
            }

            $session->setFlash("error", ['please check your mail and password and try again!']);
            $this->redirect($_SERVER['HTTP_REFERER']);

        }else{
            $session->setFlash("error", $errors);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }


    public function contactPage()
    {
        $params = [
            "title" => "Contact page",
        ];

        return $this->render('contact', $params);
    }

    public function handleContact(Request $request)
    {

    }

    public function articlesPage()
    {
        $data = array();
        $data['articles'] = ArticleModel::getAll();
        $data['title'] = "Articles";
        $data['style'] = ["article.css"];
        return$this->render("articles",$data);
    }

    public function singleArticle()
    {
        $data = ArticleModel::getByPk($_POST['id']);
        $data['title'] = $data[0]['title'];
        $data['style'] = ["article.css"];
        return$this->render("singleArticle",$data);
    }

    public function motDePresidentPage()
    {
        $data['title'] = "mot de president";
        return $this->render('motDePresident',$data);
    }

    public function techersPage()
    {
        $data['person'] = EnseignantModel::getAll();
        $data['title'] = "Teachers";
        $data['style'] = ['teachers_list.css'];
        $data['script'] = ['teachers_list.js'];
        return $this->render('teachers', $data);
    }

    public function doctorantsPage()
    {
        $data['title'] = "Doctorants";
        $data['person'] = DoctorantModel::getAll();
        $data['style'] = ['teachers_list.css'];
        $data['script'] = ['teachers_list.js'];
        return $this->render('doctorants',$data);
    }

    public function conditionSoutnancePage()
    {
        $arr['title'] = "Condition de outnance";
        return $this->render('conditionSoutnance', $arr);
    }

    public function presentationPage()
    {
        $arr['title'] = "PresentationP de labo";
        return $this->render('presentation',$arr);
    }

    public function evenementsPage()
    {
        $arr['title'] = "évenements";
        return $this->render('evenements',$arr);
    }

}