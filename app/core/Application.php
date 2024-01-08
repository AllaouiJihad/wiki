<?php
// namespace app\core;
require_once 'Router.php';
class Application{
    public function run(){

         $callback = Router::getCallback();
         echo $callback;
        // $routes = Router::getroutes();

    //     echo '<pre>';
    //    var_dump($callback);
    //     echo '</pre>';
    // if (is_callable($callback)) {
    //     call_user_func($callback);
    // } else {
    //     echo "Invalid callback!";
    // }
        
       
     }
}