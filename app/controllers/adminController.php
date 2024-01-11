<?php
// namespace App\controllers;
require_once '../app/core/Router.php';
require_once '../app/models/Tag.php';

class AdminController{
    public Router $router;
    public Tag $tag;
    public function __construct()
    {
        $this->router = new Router();
        $this->tag = new Tag();
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']== 'save')
            {
                $tagName = $_POST['name'];
                $this->tag->setTag_name($tagName);
                $this->tag->addTag();
                
                header('Location: /tags');
            }
        }
    }

