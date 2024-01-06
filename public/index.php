<?php
require_once '../app/core/Application.php';
require_once '../app/controllers/HomeController.php';
// use app\core\Application;
// use app\controllers\HomeController;
$app = new Application();
Router::get('/',[HomeController::class, 'index']);
$app->run();