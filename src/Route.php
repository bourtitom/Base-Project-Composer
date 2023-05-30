<?php
namespace Excomposer;

class Route {

    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable){
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function match($url){
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call() {
         $rep = explode("@", $this->callable);
         $controller = "Excomposer\\Controllers\\".$rep[0];
         $controller = new $controller();

        return call_user_func_array([$controller, $rep[1]], $this->matches);
    }

}
