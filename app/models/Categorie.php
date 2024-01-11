<?php
require_once '../database/database.php';
class Categorie{
    private $id;
    private $categorieName;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getCategorieName() {
        return $this->categorieName;
    }
    public function setCategorieName($categorieName) {
        $this->categorieName = $categorieName;
    }

    public function getAllcategories(){
        $sql = "SELECT * FROM `category`";
        $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }

    }
}