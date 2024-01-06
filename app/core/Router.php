<?php
require_once 'Request.php';
class Router {
    static private array $routes = [];

    static public function get($path, $callback){
        if (is_array($callback))
        self::$routes['get'][$path]=$callback;
    }

    static public function post($path, $callback){
        if (is_array($callback))
        self::$routes['post'][$path]=$callback;
    }
    
    static public function getroutes(){
        return self::$routes;
    }
    
    static public function getCallback(){ 
        $path= Request::getPath();
        $method = strtolower(Request::getMethod());
        // var_dump($path);
        // var_dump($method);
        $callback = self::$routes[$method][$path] ?? false;

        if ($callback) {
            if (is_string($callback)) {
                return $this->renderView($callback);
            }
        
            if (is_array($callback)) {
                $controller = new $callback[0]();
                $method = $callback[1];

                return call_user_func([$controller, $method]);

            }
        
            return call_user_func($callback);
        }
        return $this->renderView(404);
    }

    public function renderView($view, $variables = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent =  $this->renderOnlyView($view, $variables);
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    protected function renderOnlyView($view, $variables = [])
    {
        extract($variables);

        ob_start();
        require_once dirname(__DIR__)."app/views/$view.php";
        return ob_get_clean();
    }


    protected function layoutContent()
    {
        ob_start();
        require_once dirname(__DIR__)."app/views/layout/main.php";
        return ob_get_clean();
    }
}