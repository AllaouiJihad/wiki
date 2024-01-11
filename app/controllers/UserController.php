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

    public function signup() {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            
            // var_dump("coco cv");
            if(!empty($_POST['lname']) && !empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['pwd']))
            {
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $email = $_POST['email'];
                // var_dump($email);
                // die();
                $pwd = $_POST['pwd'];
                
                $user = new User;
                
                // var_dump($user);
                // die();
                $user->setFname($fname);
                $user->setLname($lname);
                $user->setEmail($email);
                $user->setPassword($pwd);
                // var_dump($user->getEmail());
                // die();
         
                if($user->signup()){
                  header('Location: login');
                  } 
            }
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST['email']) &&!empty($_POST['pwd']))
            {
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                $user = new User;
                $user->setEmail($email);
                $user->setPassword($pwd);
                $findUser = $user->login();
                if($findUser){
                    $_SESSION['id'] = $findUser['id_user'];
                    // $_SESSION['firstname'] = $user->getFname();
                    // $_SESSION['lastname'] = $user->getLname();
                    // $_SESSION['email'] = $user->getEmail();
                    $_SESSION['id_role']=$findUser['id_role'];
                    // var_dump($_SESSION['id_role']);die();
                    header('Location: /');
                }
            }
        }
    }
    public function logout()
    {
        session_destroy();
         header('Location: /');
    }
    
}