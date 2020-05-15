<?php

namespace app\core;
use app\core\View;

class Router{

    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require('app/config/routes.php');
        foreach ($arr as $key=>$val){
            $this -> add($key, $val);
        }

    }

    public function add($route, $param){
        // echo "<p> add() </p>";
        $route = '#^'.$route.'\?.*$|^'.$route.'$#';
        $this -> routes[$route] = $param;
    }

    public function match(){
        // echo "<p> match() </p>";
        $url = trim($_SERVER['REQUEST_URI'],'/');       //trim — Удаляет пробелы (или другие символы) из начала и конца строки
        // echo "<p style='margin: 50px;'> url: $url </p>";
        // echo "<p>this routs: ".var_dump($this->routes)."</p>";
        foreach( $this->routes as $route => $params){
            
                // echo "<br/>routs: ";
                // var_dump($route);
                // echo "<br/>params: ";
                // var_dump($params);

            if (preg_match($route, $url, $matches)){
                // echo "<p>_______________________________________</p>";
                // echo "<br/> matches: ";
                // echo var_dump($matches);
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(){
        if ($this->match()){
            $path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';      //ucfirst — Преобразует первый символ строки в верхний регистр
            // $path = 'app\controllers\MainController';
            // echo '<p>Вызов контроллера (Router run) = '.$path.'</p>';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                // echo '<p>Вызов action (Router run)  = '.$action.'</p>';

                if (method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                }
                else{
                    View::errorCode(404);
                }
            }
            else{
                View::errorCode(404);
            }
        }
        else {
            View::errorCode(404);
        }
    }

    public function debug($array){
        foreach($array as $key=>$val){
            echo "<br/>".$key." => ".$val;
        }
    }

}
