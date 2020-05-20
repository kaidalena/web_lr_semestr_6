<?php

namespace app\core;

use app\core\View;
use app\models\Statistic;

abstract class Controller{

public $route;
public $view;
public $model;
public $data;
public $stat;

     public function __construct($route){
        //   echo "<p>Controller __construct(route)</p>";
        $this->route = $route;
        session_destroy();
        // $_SESSION['isAdmin']= 1;
        if(!isset($_SESSION['isAdmin'])){
            echo "<p style='margin-left: 50px;'> !isAdmin </p>";
            $this->stat = new Statistic($this->route['action']);
            $this->stat->save_statistic($this->route['controller'].'/'.$this->route['action']);
        }
        $this->model = $this->autoloadModel($route['controller']);   //загрузка определенной модкли
         echo "<p>".var_dump($this->model)."</p> <p>before loadModel()</p>";
         $this->data = $this->model->loadModel();      //загрузка данных для определенного action
         $this->view = new View($this->route);
     }

    public function autoloadModel($name){
        $path = 'app\models\\'.ucfirst($name);      //ucfirst — Преобразует первый символ строки в верхний регистр
        $fn = $path.'.php';
     //    echo "<p>autoload model path = $path   </p>";
        if (file_exists($fn)) {
          //    echo "<p>fn:   $fn</p>";
             require $fn;
             //создание определенной (дочерней) модели. Параметром передается action
             return new $path($this->route['action']);
        }else{
             echo "<p>model $fn not found</p>";
        }

    }
}
