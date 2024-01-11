<?php
session_start();
require_once '../app/core/Application.php';
// use app\core\Application;
// use app\controllers\HomeController;
$app = new Application();
Router::get('/registre', 'signup');
Router::post('/registre',[UserController::class, 'signup']);
Router::get('/login', 'login');
Router::post('/login',[UserController::class, 'login']);

Router::get('/', [WikiController::class, 'getAllwiki']);
Router::get('/logout',[UserController::class, 'logout']);
Router::get('/addWiki','addWiki');
// Router::get('/', [WikiController::class, 'getAllCategory']);
$app->run();