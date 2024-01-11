<?php
require_once '../app/core/Router.php';
require_once '../app/models/Wiki.php';
require_once '../app/models/Categorie.php';
require_once '../app/models/Tag.php';
require_once '../app/models/TagWiki.php';

class WikiController{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }
    public function getAllwiki(){
        $wiki = new Wiki;
        $category = new Categorie;
        $allwikis =  $wiki->getAllWikis();
        $allcategories = $category->getAllcategories();
        // var_dump($allwikis);die();
        return $this->router->renderView('homePage',["allcategories" => $allcategories,"allwikis"=>$allwikis]);

    }

    public function getAllCategories(){
        $category = new Categorie();
        return $category->getAllcategories();
    }
    
    public function getAllTags(){
        $tag = new Tag();
        return $tag->getAllTags();
    }
    
    public function getAllCategoriesTags(){
        $categories = $this->getAllCategories();
        $tags = $this->getAllTags();
        // var_dump($categories);die();
        return $this->router->renderView('addwiki',  ["categories" => $categories, "tags" =>$tags]);
    }

    public function addWiki(){
        // echo "coco cv"; die();  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['tag']) && !empty($_POST['categotie']))
            {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $tags = $_POST['tag'];
                $categorie = $_POST['categotie'];
                $auteur = $_SESSION['id'];
                $wiki = new Wiki;
                $wiki->setAuteur($auteur);
                $wiki->setTitre($title);
                $wiki->setCategorie($categorie);
                $wiki->setDate(date("Y-m-d"));
                $wiki->setContenu($content);
                $id=$wiki->addWiki();
                foreach($tags as $tag){
                    $tagWiki = new TagWiki;
                    $tagWiki->setTag($tag);
                    $tagWiki->setWiki($id);
                    $tagWiki->addwikitag();
                }
                header('Location: /');
            }
        }

    }
}