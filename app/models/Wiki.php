<?php
require_once '../database/database.php';
class Wiki{
    private $id;
    private $titre;
    private $auteur;
    private $categorie;
    private $date;
    private $status;
    private $contenu;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getTitre() {
        return $this->titre;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

 

    public function getDate() {
        return $this->date;
    }
    public function setDate($date) {
        $this->date = $date;
    }

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = $status;
    }

    public function getContenu() {
        return $this->contenu;
    }
    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }


    public function getAllWikis(){
        $sql = "SELECT * FROM  `wiki` JOIN utilisateur ON wiki.id_utilisateur = utilisateur.id_user WHERE status = 1 ORDER BY `wiki`.`date` DESC ";
        $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }

    }

    public function addWiki(){
        Database::connexion()->getPdo()->beginTransaction();
        $sql = "INSERT INTO `wiki`(`title`, `content`, `date`, `id_utilisateur`, `id_category`) 
                    VALUES (?,?,?,?,?)";
        $stmt = Database::connexion()->getPdo()->prepare($sql);
        $stmt->execute([$this->titre, $this->contenu, $this->date, $this->auteur, $this->categorie]);
        if ($stmt) {
            $last_id = Database::connexion()->getPdo()->query('SELECT MAX(id) FROM wiki')->fetchcolumn();
            return $last_id;
        } 
        else {
        
            return false;
        }
    }

    public function getWiki($id){
        $sql = "SELECT * FROM  `wiki` WHERE id = $id";
        $row = Database::connexion()->getPdo()->query($sql)->fetch(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }
    }

    public function getMywikis($auteur){
        $sql = "SELECT * FROM  `wiki` WHERE id_utilisateur = $auteur";
        $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }
    }

    public function deleteWiki($id){
        $sql ="DELETE FROM `wiki` WHERE id = $id";
        $result = Database::connexion()->getPdo()->query($sql);
        if ($result) {
            return true;
        }
    }
    public function getArchiveWikis(){
        $sql = "SELECT * FROM wiki JOIN utilisateur ON wiki.id_utilisateur = utilisateur.id_user  WHERE wiki.status = 0";
        $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }
    }
    public function desarchiver($id){
        $sql = "UPDATE `wiki` SET `status` = 1 WHERE id = $id";
        $result = Database::connexion()->getPdo()->prepare($sql);
        $result->execute();
    }

    public function archiver($id){
        $sql = "UPDATE `wiki` SET `status` = 0 WHERE id = $id";
        $result = Database::connexion()->getPdo()->prepare($sql);
        $result->execute();
    }
}