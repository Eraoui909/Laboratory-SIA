<?php

use app\Controllers\AdminController;
use app\Controllers\DoctorantController;
use app\Controllers\EnseignantController;
use app\Controllers\EventController;
use app\Controllers\LangController;
use app\Controllers\NewsLetterInscriController;
use app\Controllers\SiteController;

use app\Controllers\TeamController;
use app\core\Application;
use app\core\Database;

require_once __DIR__ . '\..\vendor\autoload.php';

global $GLOBAL_DIR;
$GLOBAL_DIR = ''; // /public

session_start();
/*
 * this is for multi language
 */
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "fr";
}
$langFile = $_SESSION['lang'] . ".php";
include_once dirname(__DIR__) . "\language\\" . $langFile;

/*
 * the app variable is an instance from Application class
 */
$app = new Application(dirname(__DIR__));

/*
 * the db variable is an instance from Database class : connection to database
 */
$db = new Database();


$app->router->get('/lang/en', [LangController::class, 'changeLangToEn']);

$app->router->get('/lang/fr', [LangController::class, 'changeLangToFr']);



$app->router->get('/home',[SiteController::class, 'homePage']);
$app->router->get('/',[SiteController::class, 'homePage']);

$app->router->get('/login', [SiteController::class, 'loginPage']);
$app->router->post('/login', [SiteController::class, 'login']);

$app->router->get('/logout', [SiteController::class, 'logoutPage']);

$app->router->get('/contact', [SiteController::class, 'contactPage']);

$app->router->post('/contact',[SiteController::class, 'handleContact']);

$app->router->get('/contact', [SiteController::class, 'contactPage']);
$app->router->post('/contact/send', [SiteController::class, 'sendContact']);


$app->router->get('/evenements',[SiteController::class,'evenementsPage']);

$app->router->post('/search',[SiteController::class,'searchResult']);

/* **********************************************
*                                               *
*  this side it's for all admin panel ROUTES    *
*                                               *
* ********************************************* */

//$app->router->get('/admin/register',[AdminController::class,'registerPage']);
//$app->router->post('/admin/register',[AdminController::class,'registerAdmin']);


$app->router->get('/admin/dashboard',[AdminController::class,'dashboard']);
$app->router->get('/admin',[AdminController::class,'dashboard']);
$app->router->get('/admin/',[AdminController::class,'dashboard']);

$app->router->get('/admin/login',[AdminController::class,'loginPage']);
$app->router->post('/admin/login',[AdminController::class,'loginHandler']);
$app->router->get('/admin/logout',[AdminController::class,'logoutHandler']);


$app->router->get('/admin/profile',[AdminController::class,'profilePage']);
$app->router->post('/admin/profile',[AdminController::class,'updateProfile']);
$app->router->get('/admin/deletePic',[AdminController::class,'deletePicture']);

$app->router->get('/admin/enseignant',[EnseignantController::class,'enseignantPage']);
$app->router->post('/admin/enseignant/add',[EnseignantController::class,'ajouterEnseignant']);
$app->router->post('/admin/enseignant/modify',[EnseignantController::class, 'modifierEnseignant']);
$app->router->post('/admin/enseignant/delete',[EnseignantController::class, 'deleteEnseignant']);

$app->router->get('/admin/doctorant',[DoctorantController::class,'doctorantPage']);
$app->router->post('/admin/doctorant/add',[EnseignantController::class,'ajouterEnseignant']);
$app->router->post('/admin/doctorant/modify',[EnseignantController::class, 'modifierEnseignant']);
$app->router->post('/admin/doctorant/delete',[EnseignantController::class, 'deleteEnseignant']);

$app->router->get('/admin/teams',[AdminController::class,'teamsPage']);
$app->router->post('/admin/teams/add',[TeamController::class,'addTeam']);
$app->router->post('/admin/teams/delete',[TeamController::class,'deleteTeam']);
$app->router->post('/admin/teams/add-teacher',[TeamController::class,'addTeacherToTeam']);
$app->router->post('/admin/teams/delete-teacher',[TeamController::class,'deleteTeacherFromTeam']);

$app->router->get('/admin/events',[AdminController::class,'EventsPage']);
$app->router->post('/admin/events/add',[EventController::class,'addEvent']);
$app->router->post('/admin/events/delete',[EventController::class,'deleteEvent']);
$app->router->post('/admin/events/modify',[EventController::class,'modifyEvent']);

$app->router->get('/admin/inbox',[AdminController::class,'inboxPage']);
$app->router->get('/admin/readMsg',[AdminController::class,'readMsgPage']);
$app->router->post('/admin/msg/delete',[AdminController::class,'deleteMsg']);

$app->router->get('/motDePresident',[SiteController::class, 'motDePresidentPage']);
$app->router->get('/conditionSoutnance',[SiteController::class, 'conditionSoutnancePage']);
$app->router->get('/presentation',[SiteController::class, 'presentationPage']);
$app->router->get('/teachers',[SiteController::class, 'techersPage']);
$app->router->get('/doctorants',[SiteController::class, 'doctorantsPage']);

/* **********************************************
*                                               *
*  this side it's for all teachers ROUTES       *
*                                               *
* ********************************************* */

$app->router->get('/teacher/profile',[EnseignantController::class, 'teacherProfile']);
$app->router->post('/teacher/profile',[EnseignantController::class, 'updateProfile']);
$app->router->get('/teacher/deletePic',[EnseignantController::class, 'deletePicture']);

$app->router->post('/teacher/addArticle',[EnseignantController::class, 'addArticle']);
$app->router->post('/teacher/modifyArticle',[EnseignantController::class, 'modifyArticle']);
$app->router->post('/teacher/deleteArticle',[EnseignantController::class, 'deleteArticle']);
$app->router->post('/teacher/modifyArticleImg',[EnseignantController::class, 'modifyArticleImg']);

$app->router->post('/teacher/experiencePro',[EnseignantController::class, 'experiencePro']);
$app->router->post('/teacher/deleteExperiencePro',[EnseignantController::class, 'deleteExperiencePro']);

$app->router->post('/teacher/diplome',[EnseignantController::class, 'diplome']);
$app->router->post('/teacher/deleteDiplome',[EnseignantController::class, 'deleteDiplome']);


$app->router->get('/teacher/cv',[EnseignantController::class, 'teacherCV']);
$app->router->get('/teacher/cv/downoald',[EnseignantController::class, 'cvToPdf']);


$app->router->post('/teacher/changePass',[EnseignantController::class, 'changePass']);


/* ****************************************************
*                                                     *
*  this side it's for news letter inscription ROUTES  *
*                                                     *
* *************************************************** */

$app->router->post('/newsletter/inscription',[NewsLetterInscriController::class,'inscription']);
$app->router->get('/admin/newsletter',[NewsLetterInscriController::class,'newsletterPage']);
$app->router->post('/admin/newsletter/delete',[NewsLetterInscriController::class,'newsletterDelete']);
$app->router->get('/admin/sendEmails',[NewsLetterInscriController::class,'sendEmails']);





$app->run();