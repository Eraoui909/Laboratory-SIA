<?php

use app\Controllers\AdminController;
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

$lang = $_SESSION['lang'] . ".php";
include_once dirname(__DIR__) . "\language\\" . $lang;


/*
 * the app variable is an instance from Application class
 */
$app = new Application(dirname(__DIR__));


/*
 * the db variable is an instance from Database class : connection to database
 */
$db = new Database();


$app->router->get('/lang/en',[LangController::class, 'changeLangToEn']);

$app->router->get('/lang/fr',[LangController::class, 'changeLangToFr']);


$app->router->get('/home','home');

$app->router->get('/','home');

$app->router->get('/contact', [SiteController::class, 'contactPage']);

$app->router->post('/contact',[SiteController::class, 'handleContact']);

$app->router->get('/me','me');


/* **********************************************
*                                               *
*  this side it's for all admin panel ROUTES    *
*                                               *
* ********************************************* */

$app->router->get('/admin/register',[AdminController::class,'registerPage']);
$app->router->post('/admin/register',[AdminController::class,'registerAdmin']);


$app->router->get('/admin/dashboard',[AdminController::class,'dashboard']);

$app->router->get('/admin/login',[AdminController::class,'loginPage']);
$app->router->post('/admin/login',[AdminController::class,'loginHandler']);
$app->router->get('/admin/logout',[AdminController::class,'logoutHandler']);


$app->router->get('/admin/profile',[AdminController::class,'profilePage']);
$app->router->post('/admin/profile',[AdminController::class,'updateProfile']);
$app->router->get('/admin/deletePic',[AdminController::class,'deletePicture']);





$app->run();