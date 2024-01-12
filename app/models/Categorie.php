<?php
require_once '../database/database.php';
class Categorie{
    private $id;
    private $categorieName;
    private $description;

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

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getAllcategories(){
        $sql = "SELECT * FROM `category` ORDER BY `category`.`id_category` ASC limit 6";
        $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }

    }


    public function addCategorie(){
        $sql = "INSERT INTO `category` (`categoryName`, `description`) VALUES (?,?)";
        $req = Database::connexion()->getPdo()->prepare($sql);
        $req->execute([$this->categorieName,$this->description]);
        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategorie($id){
        $sql = "DELETE FROM `category` WHERE `id_category` = '$id'";
        $req = Database::connexion()->getPdo()->prepare($sql);
        $req->execute();
        
    }

    public function updateCategorie($id){
        $sql = "UPDATE `category` SET `categoryName` =?, `description` =? WHERE `id_category` = '$id'";
        $req = Database::connexion()->getPdo()->prepare($sql);
        $req->execute([$this->categorieName,$this->description]);
        if ($req) {
            return true;
        } else {
            return false;
        }
    }
}