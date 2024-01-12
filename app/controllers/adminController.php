<?php
// namespace App\controllers;
require_once '../app/core/Router.php';
require_once '../app/models/Tag.php';
require_once '../app/models/Categorie.php';
require_once '../app/models/Wiki.php';

class AdminController{
    public Router $router;
    public Tag $tag;
    public Categorie $categorie;
    public Wiki $wiki;
    public function __construct()
    {
        $this->router = new Router();
        $this->tag = new Tag();
        $this->categorie = new Categorie();
        $this->wiki = new Wiki();

    }

    public function index(){
        return $this->router->renderAdminView('dashboard');
    }
    public function getTags(){
        $tags = $this->tag->getAlltags();
        // var_dump($tags);die();
        return $this->router->renderAdminView('tags',["tags"=>$tags]);

    }

    public function addTag(){
       
        }

    public function deleteTag(){
        $id = $_GET['id'];
        $this->tag->deleteTag($id);
        header('Location: /tags');
    }

    public function editTag(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']== 'save')
        {
            
            $tagName = $_POST['name'];
            // var_dump($tagName);die();
            $this->tag->setTag_name($tagName);
            $this->tag->addTag();
            
            header('Location: /tags');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']== 'modifier')
            {
                $tagName = $_POST['name'];
                $id = $_POST['id'];
                $this->tag->setTag_name($tagName);
                $this->tag->setId_tag($id);
                // var_dump('coco');die();
                $this->tag->updateTag($id);
                
                header('Location: /tags');
            }
    
    }


    public function getAllcategories(){
        $categories=$this->categorie->getAllcategories();
        return $this->router->renderAdminView('categorie',["categories"=>$categories]);
    }

    public function addCategorie(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']== 'save')
            {
                $categorieName = $_POST['name'];
                $description = $_POST['description'];
                $this->categorie->setCategorieName($categorieName);
                $this->categorie->setDescription($description);
                $this->categorie->addCategorie();
                
                header('Location: /categories');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']== 'modifier')
            {
                $categorieName = $_POST['name'];
                $description = $_POST['description'];
                $id = $_POST['id'];
                $this->categorie->setCategorieName($categorieName);
                $this->categorie->setDescription($description);
                $this->categorie->updateCategorie($id);
                
                header('Location: /categories');
            }
    }

    public function deleteCategorie(){
        $id = $_GET['id'];
        $this->categorie->deleteCategorie($id);
        header('Location: /categories');
    }

    public function getArchiveWikis(){
        $wikis=$this->wiki->getArchiveWikis();
        if (!empty($wikis)) {
            return $this->router->renderAdminView('archive',["wikis"=>$wikis]);
        }
        
    }
    public function desarchiver(){
        $id = $_GET['id'];
        $this->wiki->desarchiver($id);
        header('Location: /archive');
    }
    public function archiver(){
        $id = $_GET['id'];

        $this->wiki->archiver($id);
        header('Location: /wikis');
    }

    public function getWikis(){
        $wikis=$this->wiki->getAllWikis();
        if (!empty($wikis)) {
            return $this->router->renderAdminView('wikis',["wikis"=>$wikis]);
        }
    }
    

}

