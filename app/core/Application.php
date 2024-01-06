<?php
// namespace app\core;
require_once 'Router.php';
class Application{
    public function run(){

        $callback = Router::getCallback();
 
        $callback = Router::getCallback();

    if (is_callable($callback)) {
        call_user_func($callback);
    } else {
        echo "Invalid callback!";
    }
        
       
     }
}