<?php

use app\Controllers\AdminController;
use app\Controllers\LangController;
use app\Controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '\..\vendor\autoload.php';

session_start();
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}
$langg = $_SESSION['lang'] . ".php";
include_once __DIR__."\..\language\\".$langg;

/*
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
*/

$app = new Application(dirname(__DIR__));


$db = new \app\core\Database();


$app->router->get('/public/lang/en',[LangController::class,'changeLangToEn']);

$app->router->get('/public/lang/fr',[LangController::class,'changeLangToFr']);


$app->router->get('/public/home','home');

$app->router->get('/public/','home');

$app->router->get('/public/contact',[SiteController::class,'contactPage']);

$app->router->post('/public/contact',[SiteController::class,'handleContact']);

$app->router->get('/public/me','me');

$app->router->get('/public/admin/register',[AdminController::class,'registerPage']);
$app->router->post('/public/admin/register',[AdminController::class,'registerAdmin']);




$app->run();