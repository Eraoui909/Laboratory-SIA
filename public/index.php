<?php

use app\Controllers\AdminController;
use app\Controllers\DoctorantController;
use app\Controllers\EnseignantController;
use app\Controllers\LangController;
use app\Controllers\SiteController;

use app\core\Application;
use app\core\Database;

require_once __DIR__ . '\..\vendor\autoload.php';

session_start();
/*
 * this is for multi language
 */
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}

//unset($_SESSION['flash_messages']['error']['value'][0]);
//exit;

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


$app->router->get('/home','home');
$app->router->get('/','home');

$app->router->get('/login', [SiteController::class, 'loginPage']);
$app->router->post('/login', [SiteController::class, 'login']);

$app->router->get('/logout', [SiteController::class, 'logoutPage']);

$app->router->get('/contact', [SiteController::class, 'contactPage']);

$app->router->post('/contact',[SiteController::class, 'handleContact']);

$app->router->get('/contact', [SiteController::class, 'contactPage']);

$app->router->get('/articles', 'articles');

$app->router->get('/articles/15', 'singleArticle');

/* **********************************************
*                                               *
*  this side it's for all admin panel ROUTES    *
*                                               *
* ********************************************* */

$app->router->get('/admin/register',[AdminController::class,'registerPage']);
$app->router->post('/admin/register',[AdminController::class,'registerAdmin']);


$app->router->get('/admin/dashboard',[AdminController::class,'dashboard']);
$app->router->get('/admin',[AdminController::class,'dashboard']);

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
$app->router->post('/admin/doctorant/add',[DoctorantController::class,'ajouterDoctorant']);
$app->router->post('/admin/doctorant/modify',[DoctorantController::class,'modifierDoctorant']);
$app->router->post('/admin/doctorant/delete',[DoctorantController::class,'deleteDoctorant']);



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



$app->router->get('/teacher/cv',[EnseignantController::class, 'teacherCV']);
$app->router->get('/teacher/cv/downoald',[EnseignantController::class, 'cvToPdf']);




$app->run();