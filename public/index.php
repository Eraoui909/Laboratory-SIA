<?php

use app\Controllers\AdminController;
use app\Controllers\EnseignantController;
use app\Controllers\LangController;
use app\Controllers\SiteController;

use app\core\Application;
use app\core\Database;

require_once __DIR__ . '\..\vendor\autoload.php';

session_start();
//unset($_SESSION);
//session_destroy();
//exit;
/*
 * this is for multi language
 */
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}

$lang = $_SESSION['lang'] . ".php";
include_once __DIR__."\..\language\\" . $lang;


/*
 * the app variable is an instance from Application class
 */
$app = new Application(dirname(__DIR__));


/*
 * the db variable is an instance from Database class : connection to database
 */
$db = new Database();


$app->router->get('/public/lang/en',[LangController::class, 'changeLangToEn']);

$app->router->get('/public/lang/fr',[LangController::class, 'changeLangToFr']);


$app->router->get('/public/home','home');

$app->router->get('/public/','home');

$app->router->get('/','home');

$app->router->get('/public/contact', [SiteController::class, 'contactPage']);
$app->router->get('/contact',[SiteController::class, 'contactPage']);

$app->router->post('/public/contact',[SiteController::class, 'handleContact']);

$app->router->get('/public/me','me');


/* **********************************************
*                                               *
*  this side it's for all admin panel ROUTES    *
*                                               *
* ********************************************* */

$app->router->get('/public/admin/register',[AdminController::class,'registerPage']);
$app->router->post('/public/admin/register',[AdminController::class,'registerAdmin']);


$app->router->get('/public/admin/dashboard',[AdminController::class,'dashboard']);

$app->router->get('/public/admin/login',[AdminController::class,'loginPage']);
$app->router->post('/public/admin/login',[AdminController::class,'loginHandler']);
$app->router->get('/public/admin/logout',[AdminController::class,'logoutHandler']);


$app->router->get('/public/admin/profile',[AdminController::class,'profilePage']);


$app->router->get('/public/admin/enseignant',[EnseignantController::class,'enseignantPage']);







$app->run();