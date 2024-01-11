<?php
require_once '../database/database.php';

class Tag{
    private $id_tag;
    private $tag_name;

    public function getId_tag() {
        return $this->id_tag;
    }
    public function setId_tag($id_tag) {
        $this->id_tag = $id_tag;
    }

    public function getTag_name() {
        return $this->tag_name;
    }
    public function setTag_name($tag_name) {
        $this->tag_name = $tag_name;
    }

    public function getAlltags(){
        $sql = "SELECT * FROM `tag`";
        $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }
    }
    public function addTag(){
        $sql ="INSERT INTO `tag`(`tagName`) VALUES (?)";
        $stmt = Database::connexion()->getPdo()->prepare($sql);
        $stmt->bindValue(1, $this->tag_name);
        $stmt->execute();
        
    }
}