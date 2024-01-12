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

    public function getAllUsers(){
        $user = new User();
        $users = $user->getAllusers();
        // var_dump($users);die();
        return $this->router->renderAdminView('users',["users"=>$users]);
    }

    
    
}