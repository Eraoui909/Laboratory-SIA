<?php


namespace app\Controllers;


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
        if(!isset($_SESSION['token']['admin'])){
            $this->redirect('/admin/login');
        }
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

        if (!isset($_SESSION['token']['ens']))
            $this->redirect('/login');

        $arr = $_SESSION['token']['ens'];
        $arr['title'] = $_SESSION['token']['ens']['nom'] . ' ' . $_SESSION['token']['ens']['prenom'];
        $arr['articles'] = ArticleModel::getAll();
        $arr['experiences'] = ExperienceProModel::getAll();
        $arr['diplomes']    = diplomesModel::getAll();

        return $this->render('/teachers/profile', $arr);
    }

    public function updateProfile()
    {
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

                $avatar = $upload['uploaded'][0] ?? $_SESSION['token']['ens']['avatar'];
                $pass   = $_SESSION['token']['ens']['password'];
                $id     = $_SESSION['token']['ens']['id'];

                $teacherModel->setId($id);
                $teacherModel->setNom($data['nom']);
                $teacherModel->setPrenom($data['prenom']);
                $teacherModel->setEmail($data['email']);
                $teacherModel->setPassword($pass);
                $teacherModel->setTel($tel);
                $teacherModel->setAvatar($avatar);
                $teacherModel->setThematique($data['thematique']);

                $teacherModel->setDateNaissance($data['date_naissance']);
                $teacherModel->setEtatCivil($data['etat_civil']);
                $teacherModel->setAddresse($data['addresse']);
                $teacherModel->setSituationPresent($data['situation_present']);
                $teacherModel->setNbrAnneeExperience($data['nbr_annee_experience']);
                $teacherModel->setQualificationPrincipale($data['qualification_principale']);

                if($teacherModel->update()){
                    $_SESSION['token']['ens']['nom']                        = $data['nom'];
                    $_SESSION['token']['ens']['prenom']                     = $data['prenom'];
                    $_SESSION['token']['ens']['email']                      = $data['email'];
                    $_SESSION['token']['ens']['tel']                        = $tel;
                    $_SESSION['token']['ens']['avatar']                     = $avatar;
                    $_SESSION['token']['ens']['thematique']                 = $data['thematique'];

                    $_SESSION['token']['ens']['date_naissance']             = $data['date_naissance'];
                    $_SESSION['token']['ens']['etat_civil']                 = $data['etat_civil'];
                    $_SESSION['token']['ens']['addresse']                   = $data['addresse'];
                    $_SESSION['token']['ens']['situation_present']          = $data['situation_present'];
                    $_SESSION['token']['ens']['nbr_annee_experience']       = $data['nbr_annee_experience'];
                    $_SESSION['token']['ens']['qualification_principale']   = $data['qualification_principale'];

                    $this->redirect('/teacher/profile');
                }
                return;

            }

        }

        $session->setFlash("errors", $errors);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }

    public function deletePicture(){
        $data = array(
            'avatar' => 'avatar.png'
        );

        if (EnseignantModel::UpdateColumns($_SESSION['token']['ens']['id'], $data)){
            $_SESSION['token']['ens']['avatar'] = 'avatar.png';
            $this->redirect('/teacher/profile');
        }

    }

    public function teacherCV()
    {
        if (!isset($_SESSION['token']['ens']))
            $this->redirect('/login');

        $arr = $_SESSION['token']['ens'];
        $arr['title'] = 'Download CV';
        return $this->render('/teachers/cv', $arr);
    }

    public function cvToPdf()
    {
        if (!isset($_SESSION['token']['ens']))
            $this->redirect('/login');

        $arr = $_SESSION['token']['ens'];
        $arr['title'] = 'Download CV PDF';
        $arr['experiences'] = ExperienceProModel::getAll();
        $arr['diplomes']    = diplomesModel::getAll();

        return $this->renderEmpty('/teachers/cvToPDF', $arr);
    }

    public function addArticle()
    {
        if(isset($_FILES['ArticlePic']) && isset($_POST['content']) )
        {
            $session = new Session();
            $validator = new validator();

            $data = $validator->sanitize($_POST);
            $errors = $validator->require($data);
            $article = new ArticleModel();

            if (isset($_FILES["ArticlePic"]["name"][1])){
                $errors['uploads'][] = "* You can't upload multiple files";
            }

            if(empty($errors)){
                $upload = $this->UploadFile('articles', $data['title'], 'ArticlePic');
                $errors['uploads'] = $upload['errors'];

                if(empty($errors['uploads'])){

                    $picture = $upload['uploaded'][0] ?? '';
                    $teacher     = $_SESSION['token']['ens']['id'];

                    $article->setTitle($data['title']);
                    $article->setDescription($data['description']);
                    $article->setContent($data['content']);
                    $article->setTeacher($teacher);
                    $article->setPicture($picture);

                    if($article->register()){

                        //$this->redirect('/teacher/profile');
                        echo "success";
                    }
                    return;
                }

            }

            //$session->setFlash("errors", $errors);
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
            echo json_encode($errors);
        }else{
            echo "failed";
        }

    }

    public function modifyArticle()
    {
        $_POST['content'] = $_POST['contente'];
        unset($_POST['contente']);
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

    public function modifyArticleImg()
    {
        if(empty($_FILES['pictures']['name'][0]))
        {
            $this->redirect($_SERVER['HTTP_REFERER']);
        }
        $pic = Helper::UploadFile('articles',rand(50,1000));
        if(isset($pic['errors'][0]))
        {
            echo "error";
        }else{
            $pice['picture'] = $pic['uploaded'][0];
            if(ArticleModel::UpdateColumns($_POST['articleID'],$pice))
            {
                $this->redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function experiencePro()
    {
        $validator  = new Validator();
        $session    = new Session();
        $data   = $validator->sanitize($_POST);
        $errors = $validator->require($data);

        if(empty($errors))
        {
            $experience = new ExperienceProModel();
            $experience->setPersonneId($_SESSION['token']['ens']['id']);
            $experience->setDateDebut($data['date_debut']);
            $experience->setDateFin($data['date_fin']);
            $experience->setEntreprise($data['entreprise']);
            $experience->setFonction($data['fonction']);
            $experience->setDescription($data['description']);

            if($experience->register())
            {
                $session->setFlash('experience_error',[]);
                $this->redirect("/teacher/profile");
            }
        }else{
            $session->setFlash('experience_error',$errors);
            $this->redirect("/teacher/profile");
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
        $validator = new Validator();
        $session = new Session();
        $data = $validator->sanitize($_POST);
        $errors = $validator->require($data);

        if (empty($errors)) {
            $diplome = new diplomesModel();
            $diplome->setPersonneId($_SESSION['token']['ens']['id']);
            $diplome->setInstitut($data['institut']);
            $diplome->setVille($data['ville']);
            $diplome->setDateDebut($data['date_debut']);
            $diplome->setDateFin($data['date_fin']);
            $diplome->setDiplome($data['diplome']);
            $diplome->setTitre($data['titre']);
            $diplome->setCertificat($data['certificat']);

            if ($diplome->register()) {
                $session->setFlash('experience_error', []);
                $this->redirect("/teacher/profile");
            }
        } else {
            $session->setFlash('experience_error', $errors);
            $this->redirect("/teacher/profile");
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

}