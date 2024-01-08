<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Core\Database;
use Core\Router;
use App\Controllers\homeController;
use App\Controllers\testController;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = strtolower($_SERVER['REQUEST_METHOD']);
// echo "<pre>";
// print_r($method);
// echo "</pre>";
// die();
$Route = new Router();
$Route->get('/',fn()=>homeController::home());
// $Route->get('/anass',fn()=>testController::hy());
$Route->dispatch($uri,$method);


