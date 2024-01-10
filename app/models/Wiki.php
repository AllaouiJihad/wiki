<?php
require_once '../database/database.php';
class Wiki{
    private $id;
    private $titre;
    private $auteur;
    private $categorie;
    private $tag;
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

    public function getTag() {
        return $this->tag;
    }

    public function setTag($tag) {
        $this->tag = $tag;
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


    public function getAllwiki(){
        $sql = "SELECT * FROM `wiki` WHERE `status` = 1";
        $row = Database::connexion()->getPdo()->query($sql)->fetch(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }

    }
}