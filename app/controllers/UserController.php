<?php
// namespace App\controllers;
require_once '../app/core/Router.php';
require_once '../app/models/User.php';
class UserController{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    
    
}