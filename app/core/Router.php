<?php
require_once 'Request.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/WikiController.php';
require_once '../app/controllers/adminController.php';
require_once '../app/controllers/UserController.php';
class Router {
    static private array $routes = [];

    static public function get($path, $callback){
        self::$routes['get'][$path] = $callback;
    }

    static public function post($path, $callback){
        self::$routes['post'][$path] = $callback;
    }
    
    static public function getroutes(){
        return self::$routes;
    }
    
    static public function getCallback(){ 
        $path = Request::getPath();
        $method = strtolower(Request::getMethod());

        $callback = self::$routes[$method][$path] ?? false;

        if ($callback) {
            if (is_string($callback)) {
                return self::renderView($callback);
            }

            if (is_array($callback) && class_exists($callback[0])) {
                $controller = new $callback[0]();
                $method = $callback[1];

                if (method_exists($controller, $method)) {
                    return call_user_func([$controller, $method]);
                }
            }

           
                return call_user_func($callback);
            
        }

        // Route not found
        http_response_code(404);
        return self::renderView('404'); 
    }

    static public function renderView($view, $variables = [])
    {
        $layoutContent = self::layoutContent();
        $viewContent =  self::renderOnlyView($view, $variables);
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }


    static public function renderAdminView($view, $variables = []){
        $layoutContent = self::layoutAdminContent();
        $viewContent =  self::renderOnlyView($view, $variables);
        return str_replace("{{admincontent}}", $viewContent, $layoutContent);
    }


    static protected function renderOnlyView($view, $variables = [])
    {
        extract($variables);
        // echo $variables;

        ob_start();
        require_once dirname(__DIR__)."\\views\\$view.php";
        return ob_get_clean();
    }

    static protected function layoutAdminContent(){
        ob_start();
        require_once dirname(__DIR__)."\\views\\layout\\adminMain.php";
        return ob_get_clean();
    }
    static protected function layoutContent()
    {
        ob_start();
        require_once dirname(__DIR__)."\\views\\layout\\main.php";
        return ob_get_clean();
    }
}