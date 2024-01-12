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
Router::get('/MyWikis', [WikiController::class,'getMyWikis']);

Router::get('/delete', [WikiController::class,'deletewiki']);
// Router::get('/', [WikiController::class, 'getAllCategory']);


Router::get('/dashboard', [adminController::class,'index']);

Router::get('/tags', [adminController::class, 'getTags']);
Router::post('/tags', [adminController::class, 'addTag']);
Router::get('/deleteTag', [adminController::class, 'deleteTag']);
Router::post('/tags', [adminController::class, 'editTag']);

Router::get('/categories', [adminController::class, 'getAllcategories']);
Router::post('/categories', [adminController::class, 'addCategorie']);
Router::get('/deleteCategorie', [adminController::class, 'deleteCategorie']);
$app->run();
