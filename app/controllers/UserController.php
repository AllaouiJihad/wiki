<?php
// namespace App\controllers;
require_once '../app/core/Router.php';
require_once '..\app\models\User.php';
class UserController{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    // public function signup(){
    //     echo $this->router->renderView('login');
    //     // include '../app/views/login.php';
    // }

    public function signup() {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='submit')
        {
            if(!empty($_POST['lname']) && !empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['pwd']))
            {
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                var_dump("coco cv");
                $user = new User();
                $user->setFname($fname);
                $user->setLname($lname);
                $user->setEmail($email);
                $user->setPassword($pwd);
                
                
                if($user->signup()){
                  echo "success";
                  } 
            }
        }
    }
    
}