<?php
require_once '../app/core/Application.php';
require_once '../app/controllers/UserController.php';
// use app\core\Application;
// use app\controllers\HomeController;
$app = new Application();
Router::get('/regitre', 'signup');
Router::post('/regitre',[UserController::class, 'signup']);
// Router::post('/login',[HomeController::class, 'login']);
$app->run();