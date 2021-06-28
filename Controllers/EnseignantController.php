<?php

namespace app\Controllers;

global $session_actuel;



use app\core\Controller;
use app\core\Helper;
use app\core\Session;
use app\core\Validator;
use app\models\ArticleModel;
use app\models\diplomesModel;
use app\models\EnseignantModel;
use app\models\ExperienceProModel;

class EnseignantController extends Controller
{
    use Helper;


    public function enseignantPage()
    {
        global $GLOBAL_DIR ;
        if(!isset($_SESSION['token']['admin'])){
            $this->redirect($GLOBAL_DIR.'/admin/login');
        }
        $data = EnseignantModel::getByQuery("SELECT * FROM enseignant WHERE specialite='ens'");
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
            $ensignant->setSpecialite($data['specialite']);

            $ensignant->register();

            echo json_encode("success");

        }else{
            echo  json_encode($errors);
        }
    }

    public function modifierEnseignant()
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
        global $GLOBAL_DIR ;
        global $session_actuel;

        if (!isset($_SESSION['token']['ens']) && !isset($_SESSION['token']['doc'])  ) {
            $this->redirect($GLOBAL_DIR . '/login');
        }

        $arr = $_SESSION['token']['ens'] ?? $_SESSION['token']['doc'];
        $session_actuel = $arr;

        $arr['title']  = $_SESSION["token"][$session_actuel["specialite"]]["nom"] . ' ' .$_SESSION["token"][$session_actuel["specialite"]]["prenom"];
        $arr['idd'] = $_SESSION["token"][$session_actuel["specialite"]]["id"];
        $arr['articles'] = ArticleModel::getByQuery("SELECT * FROM article WHERE author = " .$session_actuel['id']);
        $arr['experiences'] = ExperienceProModel::getByQuery("SELECT * FROM experience_pro WHERE personne_id = " .$session_actuel['id']);
        $arr['diplomes']    = diplomesModel::getByQuery("SELECT * FROM diplomes WHERE personne_id = " .$session_actuel['id']);

        $arr['admin']  = true;
        $arr['CV']  = true;
        $arr['script'] = ['navbar.js','article.js','ckeditor'=>'ckeditor.js'];
        $arr['style']  = ['profile.css'];
        $arr['datatable'] = true;
        $arr['adminlte'] = true;
        return $this->render('/teachers/profile', $arr);
    }

    public function updateProfile()
    {
        global $session_actuel;


        $arr = $_SESSION['token']['ens'] ?? $_SESSION['token']['doc'];
        $session_actuel = $arr;

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

                $avatar = $upload['uploaded'][0] ?? $session_actuel['avatar'];
                $lastPic = dirname(__DIR__) . "/public/Storage/uploads/users/".$session_actuel['avatar'];
                if($session_actuel['avatar'] != "avatar.png" && $session_actuel['avatar']!=$avatar)
                {
                    unlink($lastPic);
                }
                $pass   = $session_actuel['password'];
                $id     = $session_actuel['id'];

                $teacherModel->setId($id);
                $teacherModel->setNom($data['nom']);
                $teacherModel->setPrenom($data['prenom']);
                $teacherModel->setEmail($data['email']);
                $teacherModel->setPassword($pass);
                $teacherModel->setTel($tel);
                $teacherModel->setAvatar($avatar);
                $teacherModel->setThematique($data['thematique']);
                $teacherModel->setGrade($data['grade']);

                $teacherModel->setSituationPresent($data['situation_present']);
                $teacherModel->setNbrAnneeExperience($data['nbr_annee_experience']);
                $teacherModel->setQualificationPrincipale($data['qualification_principale']);

                $teacherModel->setSpecialite($session_actuel['specialite']);

                if($teacherModel->update()){
                    $_SESSION['token'][$session_actuel['specialite']]['nom']                        = $data['nom'];
                    $_SESSION['token'][$session_actuel['specialite']]['prenom']                     = $data['prenom'];
                    $_SESSION['token'][$session_actuel['specialite']]['email']                      = $data['email'];
                    $_SESSION['token'][$session_actuel['specialite']]['tel']                        = $tel;
                    $_SESSION['token'][$session_actuel['specialite']]['avatar']                     = $avatar;
                    $_SESSION['token'][$session_actuel['specialite']]['thematique']                 = $data['thematique'];
                    $_SESSION['token'][$session_actuel['specialite']]['grade']                      = $data['grade'];

                    $_SESSION['token'][$session_actuel['specialite']]['situation_present']          = $data['situation_present'];
                    $_SESSION['token'][$session_actuel['specialite']]['nbr_annee_experience']       = $data['nbr_annee_experience'];
                    $_SESSION['token'][$session_actuel['specialite']]['qualification_principale']   = $data['qualification_principale'];

                    global $GLOBAL_DIR ;
                    //$this->redirect($GLOBAL_DIR.'/teacher/profile');
                    echo json_encode("success");
                }
                return;

            }

        }

        $session->setFlash("errors", $errors);
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo json_encode($errors);

    }

    public function deletePicture(){
        global $session_actuel;
        $data = array(
            'avatar' => 'avatar.png'
        );
        $arr = $_SESSION['token']['ens'] ?? $_SESSION['token']['doc'];
        $session_actuel = $arr;
        $lastPic = dirname(__DIR__) . "/public/Storage/uploads/users/".$session_actuel['avatar'];
        if($session_actuel['avatar'] != "avatar.png")
        {
            unlink($lastPic);
        }

        if (EnseignantModel::UpdateColumns($session_actuel['id'], $data)){
            global $GLOBAL_DIR ;
            $_SESSION['token'][$session_actuel['specialite']]['avatar'] = 'avatar.png';
            $this->redirect($GLOBAL_DIR.'/teacher/profile');
        }

    }

    public function teacherCV()
    {
        global $GLOBAL_DIR ;
        if (!isset($_SESSION['token']['ens']) || !isset($_SESSION['token']['doc']) ){
            $this->redirect($GLOBAL_DIR.'/login');
        }

        $arr = $_SESSION['token']['ens'] ??$_SESSION['token']['doc'];

        $arr['title'] = 'Download CV';
        $arr['articles'] = ArticleModel::getAll("WHERE author=".$arr['id']);

        return $this->render('/teachers/cv', $arr);
    }

    public function cvToPdf()
    {
        global $GLOBAL_DIR ;
        if(isset($_GET['cv'])&& !empty($_GET['cv']))
        {
            if(!$arr = EnseignantModel::getByPk($_GET['cv'])[0])
            {
                $this->redirect($GLOBAL_DIR.'/home');
            }

            $arr['title'] = 'Download CV PDF';
            $arr['experiences'] = ExperienceProModel::getByQuery("SELECT * FROM experience_pro WHERE personne_id=".$_GET['cv']);
            $arr['diplomes']    = diplomesModel::getByQuery("SELECT * FROM diplomes WHERE personne_id=".$_GET['cv']);
            $arr['articles']    = ArticleModel::getAll("WHERE author=".$_GET['cv']);

        }else{
            if (!isset($session_actuel))
                $this->redirect($GLOBAL_DIR.'/login');

            $arr = $session_actuel;
            $arr['title'] = 'Download CV PDF';
            $arr['experiences'] = ExperienceProModel::getAll();
            $arr['diplomes']    = diplomesModel::getAll();
        }


        return $this->renderEmpty('/teachers/cvToPDF', $arr);
    }

    public function addArticle()
    {
        global $GLOBAL_DIR ;
        global $session_actuel;


        $arr = $_SESSION['token']['ens'] ?? $_SESSION['token']['doc'];
        $session_actuel = $arr;

        if( isset($_POST['journal']) )
        {
            $session = new Session();
            $validator = new validator();

            $data = $validator->sanitize($_POST);
            $errors = $validator->require($data);
            $article = new ArticleModel();

            if(empty($errors)){
                $author     = $session_actuel['id'];

                $article->setTitle($data['title']);
                $article->setAbstract($data['abstract']);
                $article->setJournal($data['journal']);
                $article->setResearchers($data['researchers']);
                $article->setDoi($data['doi']);
                $article->setAuthor($author);

                if($article->register()){

                    //$this->redirect($GLOBAL_DIR.'/teacher/profile');
                    echo json_encode("success");
                }
                return;

            }

            $session->setFlash("errors", $errors);
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
            echo json_encode("error");
            //echo json_encode($errors);
        }else{
            echo "failed";
        }

    }

    public function modifyArticle()
    {
        $validator          = new Validator();
        $data               = $validator->sanitize($_POST);
        $errors['error']    = $validator->require($data);

        if(!empty($errors['error']))
        {
            $errors = json_encode($errors);
            echo  $errors;
        }else{
            if(ArticleModel::UpdateColumns($data['articleID'], $data))
            {
                echo json_encode("success");
            }else{
                echo json_encode("error");
            };
        }
    }

    public function deleteArticle()
    {
        if(ArticleModel::delete($_POST['articleID']))
        {
            echo json_encode("deleted");
        }else{
            echo json_encode("error");
        }
    }


    public function experiencePro()
    {
        global $GLOBAL_DIR ;
        global $session_actuel;

        $arr = $_SESSION['token']['ens'] ?? $_SESSION['token']['doc'];
        $session_actuel = $arr;


        $validator  = new Validator();
        $session    = new Session();
        $data   = $validator->sanitize($_POST);
        $errors = $validator->require($data);

        if(empty($errors))
        {
            global $session_actuel;
            $experience = new ExperienceProModel();
            $experience->setPersonneId($session_actuel['id']);
            $experience->setDateDebut($data['date_debut']);
            $experience->setDateFin($data['date_fin']);
            $experience->setEntreprise($data['entreprise']);
            $experience->setFonction($data['fonction']);
            $experience->setDescription($data['description']);

            if($experience->register())
            {
                $session->setFlash('experience_error',[]);
                //$this->redirect($GLOBAL_DIR."/teacher/profile");
                echo json_encode('success');
            }
        }else{
            $session->setFlash('experience_error',$errors);
            //$this->redirect($GLOBAL_DIR."/teacher/profile");
            echo json_encode('error');
        }
    }


    public function deleteExperiencePro()
    {
        if(ExperienceProModel::delete($_POST['id']))
        {
            echo json_encode("deleted");
        }else{
            echo json_encode("error");
        }
    }

    public function diplome()
    {
        global $session_actuel;
        global $GLOBAL_DIR ;

        $arr = $_SESSION['token']['ens'] ?? $_SESSION['token']['doc'];
        $session_actuel = $arr;

        $validator = new Validator();
        $session = new Session();
        $data = $validator->sanitize($_POST);
        $errors = $validator->require($data);

        if (empty($errors)) {
            $diplome = new diplomesModel();
            $diplome->setPersonneId($session_actuel['id']);
            $diplome->setInstitut($data['institut']);
            $diplome->setVille($data['ville']);
            $diplome->setDateDebut($data['date_debut']);
            $diplome->setDateFin($data['date_fin']);
            $diplome->setDiplome($data['diplome']);
            $diplome->setTitre($data['titre']);
            $diplome->setCertificat($data['certificat']);

            if ($diplome->register()) {
                $session->setFlash('experience_error', []);
                //$this->redirect($GLOBAL_DIR."/teacher/profile");
                echo json_encode("success");
            }
        } else {
            $session->setFlash('experience_error', $errors);
            //$this->redirect($GLOBAL_DIR."/teacher/profile");
            echo json_encode("error");
        }

    }

    public function deleteDiplome()
    {
        if(diplomesModel::delete($_POST['id']))
        {
            echo json_encode("deleted");
        }else{
            echo json_encode("error");
        }
    }

    public function changePass()
    {
        $validator = new Validator();
        $data = $validator->sanitize($_POST);
        $error = $validator->require($data);
        if(empty($error)){
        $session_actuel = $_SESSION['token']['ens'] ?? $_SESSION['token']['doc'];
        if($data['pass1'] == $data['pass2']){
            $pass = Helper::hash_undecrypted_data($data['pass1']);
            if(EnseignantModel::UpdateColumns($session_actuel['id'],['password'=>$pass])){
                echo json_encode("success");
            }else{
                echo json_encode("error");
            }
        }else{
            echo json_encode("error");
        }
        }else{
            echo json_encode("error");
        }
    }

}