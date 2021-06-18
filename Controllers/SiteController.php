<?php

namespace app\Controllers;
use app\core\Controller;


use app\core\Helper;
use app\core\Request;
use app\core\Session;
use app\core\Validator;
use app\models\ArticleModel;
use app\models\EnseignantModel;
use app\models\EventModel;
use app\models\TeamModel;

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
        (isset($_GET['n'])) ? $pag = (int)$_GET['n'] : $pag = 1;

        if($pag == 0){
            header("Location:/home");
        }
        $count  = ArticleModel::getCountTable();
        $limit    = 10;
        $nbrMax = ceil($count / $limit);
        if($pag > $nbrMax || $pag < 0){
            $pag = 1;
        }
        $offset = $limit*($pag-1);


        $data['articles'] = ArticleModel::getByQuery('SELECT *,DATE_FORMAT(date, "%W %M %e %Y") as "date" FROM article order by date DESC limit '.$limit.' offset '.$offset);
        $data['teams'] = TeamModel::getALLEquipeAndTechers();
        $data['nbrOfTeam'] = TeamModel::getCountTable();
        $data['nbrOfTeacher'] = EnseignantModel::getCountTable('WHERE specialite="ens"');
        $data['nbrPage'] = $nbrMax;
        $data['title'] = "Home";
        $data['style'] = ['marquee.css', 'Home_Style.css'];
        $data['script'] = ['CokiesHandler.js', 'marquee.js', 'HomeScript.js', 'navbar.js'];
        return $this->render('home', $data);

    }


    public function loginPage()
    {
        global $GLOBAL_DIR;
        if (isset($_SESSION['token']['ens']) || isset($_SESSION['token']['doc']))
            $this->redirect(  $GLOBAL_DIR.'/');

        $params = [
            "title" => "Login",
            "null" => true
        ];
        $params['style'] = ["login.css"];
        return $this->render('login', $params);
    }

    public function logoutPage()
    {
        global $GLOBAL_DIR ;
        unset($_SESSION['token']);
        $this->redirect($GLOBAL_DIR.'/');
    }

    public function login()
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
                    global $GLOBAL_DIR ;
                    $groupID = $result[0]['specialite'] ?? $result[0]['specialite'];
                    $_SESSION['token'][$groupID] = $result[0];
                    $this->redirect($GLOBAL_DIR.'/teacher/profile');
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


    public function motDePresidentPage()
    {
        $data['title'] = "mot de president";
        $data['style'] = ["Home_Style.css"];
        return $this->render('motDePresident',$data);
    }

    public function techersPage()
    {
        $data['person'] = EnseignantModel::getAll("WHERE specialite='ens'");
        $data['title'] = "Teachers";
        $data['style'] = ['teachers_list.css'];
        $data['script'] = ['teachers_list.js'];
        return $this->render('teachers', $data);
    }

    public function doctorantsPage()
    {
        $data['title'] = "Doctorants";
        $data['person'] = EnseignantModel::getAll("WHERE specialite='doc'");
        $data['style'] = ['teachers_list.css'];
        $data['script'] = ['teachers_list.js'];
        return $this->render('doctorants',$data);
    }

    public function conditionSoutnancePage()
    {
        $arr['title'] = "Condition de outnance";
        $arr['style'] = ['Home_Style.css'];
        return $this->render('conditionSoutnance', $arr);
    }

    public function presentationPage()
    {
        $arr['title'] = "Presentation de labo";
        $arr['style'] = ['Home_Style.css'];
        return $this->render('presentation',$arr);
    }

    public function evenementsPage()
    {
        $arr['title'] = "évenements";
        $arr['style'] = ['Home_Style.css'];
        $arr['script'] = ['evenements.js'];
        $arr['events'] = EventModel::getAll("limit 10");
        return $this->render('evenements',$arr);
    }

    public function searchResult()
    {
        global $article_after_search;
        $searchVal = filter_var($_POST['searchVal'],FILTER_SANITIZE_STRING);
        $result = ArticleModel::getAll('WHERE title like "%'.$searchVal.'%"');
        if(empty($result)){
            echo json_encode("empty");
        }else{
            unset($article_after_search);
            $article_after_search = $result;
            echo json_encode($result);
        }
    }
}