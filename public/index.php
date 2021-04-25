<?php

use app\Controllers\AdminController;
use app\Controllers\LangController;
use app\Controllers\SiteController;

use app\core\Application;

require_once __DIR__ . '\..\vendor\autoload.php';

session_start();

/*
 * this is for multi language
 */
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}
$langg = $_SESSION['lang'] . ".php";
include_once __DIR__."\..\language\\".$langg;


/*
 * the app variable is an instance from Application class
 */
$app = new Application(dirname(__DIR__));


/*
 * the db variable is an instance from Database class : connection to database
 */
$db = new \app\core\Database();


$app->router->get('/public/lang/en',[LangController::class,'changeLangToEn']);

$app->router->get('/public/lang/fr',[LangController::class,'changeLangToFr']);


$app->router->get('/public/home','home');

$app->router->get('/public/','home');

$app->router->get('/','home');

$app->router->get('/public/contact',[SiteController::class,'contactPage']);
$app->router->get('/contact',[SiteController::class,'contactPage']);

$app->router->post('/public/contact',[SiteController::class,'handleContact']);

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




$app->run();