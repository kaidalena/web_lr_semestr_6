<?php

namespace app\core;

use app\core\View;

abstract class Controller{

public $route;
public $view;
public $model;

    public function __construct($route){
        $this->route = $route;
        $this->model = $this->autoloadModel($route['controller']);
        $this->data = $this->model->loadModel();      //загрузка данных для определенного action
        $this->view = new View($this->route);
    }

    public function autoloadModel($name){
         $path = 'app\models\\'.ucfirst($name);      //ucfirst — Преобразует первый символ строки в верхний регистр
        $fn = $path.'.php';
        if (file_exists($fn)) {
             require $fn;
        }
           //создание определенной (дочерней) модели. Параметром передается action
        return new $path($this->route['action']);
    }
}
