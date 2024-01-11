<?php
require_once '../app/core/Router.php';
require_once '../app/models/Wiki.php';
require_once '../app/models/Categorie.php';
require_once '../app/models/Tag.php';
require_once '../app/models/TagWiki.php';

class WikiController{
    public Router $router;
    public Wiki $wiki;
    public function __construct()
    {
        $this->router = new Router();
        $this->wiki = new Wiki;
    }
    public function getAllwiki(){
        
        $category = new Categorie;
        $allwikis =  $this->wiki->getAllWikis();
        $allcategories = $category->getAllcategories();
        // var_dump($allwikis);die();
        return $this->router->renderView('homePage',["allcategories" => $allcategories,"allwikis"=>$allwikis]);

    }
    public function getWiki(){
        $wiki = $this->wiki->getWiki($_GET['id']);
        
        return $this->router->renderView('wiki',["wiki"=>$wiki]);
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
                
                $this->wiki->setAuteur($auteur);
                $this->wiki->setTitre($title);
                $this->wiki->setCategorie($categorie);
                $this->wiki->setDate(date("Y-m-d"));
                $this->wiki->setContenu($content);
                $id=$this->wiki->addWiki();
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