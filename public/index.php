<?php
session_start();
require_once '../app/core/Application.php';

$app = new Application();
Router::get('/registre', 'signup');
Router::post('/registre',[AuthController::class, 'signup']);
Router::get('/login', 'login');
Router::post('/login',[AuthController::class, 'login']);
Router::get('/logout',[AuthController::class, 'logout']);

Router::get('/', [WikiController::class, 'getAllwiki']);

Router::get('/addWiki',[WikiController::class,'getAllCategoriesTags']);
Router::post('/addWiki',[WikiController::class, 'addWiki']);

Router::get('/wiki', [WikiController::class,'getWiki']);
Router::get('/MyWikis', 'myWiki');
// Router::get('/', [WikiController::class, 'getAllCategory']);
$app->run();