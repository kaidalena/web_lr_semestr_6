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
        $route = '#^'.$route.'$#';
        $this -> routes[$route] = $param;
    }

    public function match(){
        $url = trim($_SERVER['REQUEST_URI'],'/');       //trim — Удаляет пробелы (или другие символы) из начала и конца строки
        // echo $_SERVER['REQUEST_URI'];
        foreach( $this->routes as $route => $params){
            if (preg_match($route, $url, $matches)){
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
}
