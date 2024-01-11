<?php
require_once '../database/database.php';
class User  {
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $pwd;
    // private $db;
    private $role;
    
    // public function __construct() {
    //     parent::__construct();
    // }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFname() {
        return $this->fname;
    }

    public function setFname($fname) {
        $this->fname = $fname;
    }

    public function getLname() {
        return $this->lname;
    }

    public function setLname($lname) {
        $this->lname = $lname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->pwd;
    }

    public function setPassword($password) {
        $this->pwd = $password;
    }   

    public function getRole() {
        return $this->role;
    }
    public function setRole($role) {
        $this->role = $role;
    }

    public function signup() {
        $hashedPassword = password_hash($this->pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `utilisateur` (`Fname`, `Lname`, `email`, `pwd`, `id_role`) VALUES (?, ?, ?, ?, 2)";
        $stmt = Database::connexion()->getPdo()->prepare($sql);
        $stmt->execute([$this->fname, $this->lname, $this->email, $hashedPassword]);
        if ($stmt) {
            return true;
        } 
        else {
            return false;
        }

    }

    public function login() {
        $sql = "SELECT * FROM `utilisateur` WHERE `email` = '$this->email'";
        // var_dump($sql);
        // die();
        $row = Database::connexion()->getPdo()->query($sql)->fetch(PDO::FETCH_OBJ);
        if($row){
            // var_dump($row->pwd);
            // die();
            if( password_verify($this->pwd, $row->pwd) ){
                
                return [
                    'id_user' => $row->id,
                    'id_role' => $row->id_role,
                    'fname' => $row->Fname,
                    'lname' => $row->Lname,
                ];
            }else{
                echo("password incorrect");
            }
        }else{
            echo("email introvable");
        }
        
    }
}