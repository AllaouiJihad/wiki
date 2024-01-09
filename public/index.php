<?php
require_once '../app/core/Application.php';
// use app\core\Application;
// use app\controllers\HomeController;
$app = new Application();
Router::get('/registre', 'signup');
Router::post('/registre',[UserController::class, 'signup']);
Router::get('/login', 'login');
// Router::post('/login',[HomeController::class, 'login']);
$app->run();