<?php

namespace app\core;

use app\core\View;

abstract class Controller{

public $route;
public $view;
public $model;

    public function __construct($route){
        $this->route = $route;
        // echo "rote = ";
        // var_dump( $route);
        $this->model = $this->autoloadModel($route['controller']);
        $this->view = new View($this->route);
        
    }

    public function autoloadModel($name){
        $path = 'app\models\\'.ucfirst($name);      //ucfirst — Преобразует первый символ строки в верхний регистр
        if (class_exists($path)){
            return new $path($this->route['action']);
        }
    }
}
