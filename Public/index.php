<?php
require_once __DIR__ . '/../vendor/autoload.php';
session_start();
use Core\Router;
use App\Controllers\ViewController;
use App\Controllers\AuthController;
use App\Controllers\admin\CategorieController;
use App\Controllers\admin\TageController;
use App\Controllers\auteur\Gestion_wiki;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = strtolower($_SERVER['REQUEST_METHOD']);
// echo "<pre>";
// print_r($method);
// echo "</pre>";
// die();
$Route = new Router();
$Route->get('/',fn()=>ViewController::home());
$Route->get('/home',fn()=>ViewController::home());
$Route->get('/login',fn()=>ViewController::Login());
$Route->get('/sign_up',fn()=>ViewController::sign_up());

if(isset($_SESSION['role']))
{
    $Route->get('/dashboard',fn()=>ViewController::dashboard());
    $Route->get('/page_home',fn()=>ViewController::dash_auteur());
    $Route->get('/gestion_wikis',fn()=>Gestion_wiki::getCategie_tags());
    $Route->get('/log_out',fn()=>AuthController::log_out());
    $Route->get('/dash_autheur',fn()=>ViewController::dash_auteur());
    $Route->post('/add_categorie',fn()=>CategorieController::Add_categorie());
    $Route->post('/update_Categorie',fn()=>CategorieController::update_Categorie());
    $Route->post('/delet_categporie',fn()=>CategorieController::delet_categporie());
    $Route->post('/add_tag',fn()=>TageController::add_tag());
    $Route->post('/update_Tag',fn()=>TageController::update_Tag());
    $Route->post('/delet_tag',fn()=>TageController::delet_tag());
    // $Route->post('/add_wiki',fn()=>Gestion_wiki::add_wiki());
    
}
$Route->get('/categorie',fn()=>CategorieController::display_categorie());
$Route->get('/gestion_Tags',fn()=>TageController::display_Tags());
$Route->post('/login_controller',fn()=>AuthController::Login());
$Route->post('/signup_controller',fn()=>AuthController::Register());
$Route->dispatch($uri,$method);