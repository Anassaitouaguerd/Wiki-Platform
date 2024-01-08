<?php
require_once __DIR__ . '/../vendor/autoload.php';
session_start();
use Core\Database;
use Core\Router;
use App\Controllers\ViewController;
use App\Controllers\AuthController;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = strtolower($_SERVER['REQUEST_METHOD']);
// echo "<pre>";
// print_r($method);
// echo "</pre>";
// die();
$Route = new Router();
$Route->get('/',fn()=>ViewController::home());
$Route->get('/dat',fn()=>Database::connection());
$Route->get('/home',fn()=>ViewController::home());
$Route->get('/login',fn()=>ViewController::Login());
$Route->get('/sign_up',fn()=>ViewController::sign_up());
$Route->get('/dashboard',fn()=>ViewController::dashboard());
$Route->get('/categorie',fn()=>ViewController::categorie());
$Route->post('/login_controller',fn()=>AuthController::Login());
$Route->post('/signup_controller',fn()=>AuthController::Register());
$Route->dispatch($uri,$method);