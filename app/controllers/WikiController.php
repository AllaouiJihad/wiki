<?php
require_once '../app/core/Router.php';
require_once '../app/models/Wiki.php';
require_once '../app/models/Categorie.php';

class WikiController{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }
    public function getAllwiki(){
        $wiki = new Wiki;
        $allwikis =  $wiki->homepage();
        // var_dump($allwikis);die();
        return $this->router->renderView('homePage',["allwikis"=>$allwikis]);

    }

    public function getAllCategory(){
        $category = new Categorie();
        $categories = $category->getAllcategorie();
        return $this->router->renderView('homePage',["categories"=>$categories]);
    }
}