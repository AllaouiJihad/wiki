<?php
class Database{
    private  $pdo;
    private static $_INSTANCE;

    private function __construct() {
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=wiki', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e;
            exit();
        }
    }

    public static function connexion(){
        if(!isset($_INSTANCE)){
                self::$_INSTANCE=new self();
        }
        return self::$_INSTANCE;
    }

   public function getPdo(){
    return $this->pdo;
   } 

   private function __clone(){

   }
}


// class Database {
//     private $host = "localhost";
//     private $user = "root";
//     private $password = "";
//     private $database = "wiki";
//     private $conn;

//     public function __construct() {
//         try {
//             $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             echo 'Connection successful!';
//         } catch (PDOException $e) {
//             echo 'Connection failed: ' . $e;
//             die();
//         }
//     }

//     public function getConnection() {
//         return $this->conn;
//     }
// }

// // // Usage example
// // $database = new Database();
// // $pdo = $database->getConnection();
?>

