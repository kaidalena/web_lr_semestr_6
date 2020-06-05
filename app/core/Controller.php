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

        if( !isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin']){
            $this->stat = new Statistic($this->route['action']);
            $this->stat->save_statistic($this->route['controller'].'/'.$this->route['action']);
        }
        // echo "<p style='margin-left: 50px;'>session: ";
        // print_r($_SESSION);
        // echo "<p>";
        $this->model = $this->autoloadModel($route['controller']);   //загрузка определенной модкли
        //  echo "<p>before loadModel()</p>";
         $this->data = $this->model->loadModel();      //загрузка данных для определенного action
         $this->view = new View($this->route);
        //  echo "<p>after new View()</p>";
     }

    public function autoloadModel($name){
        $path = 'app\models\\'.ucfirst($name);      //ucfirst — Преобразует первый символ строки в верхний регистр
        $fn = $path.'.php';
        // echo "<p>autoload model path = $path   </p>";
        if (file_exists($fn)) {
          //    echo "<p>fn:   $fn</p>";
             require $fn;
             //создание определенной (дочерней) модели. Параметром передается action
             return new $path($this->route['action']);
        }else{
            //  echo "<p>model $fn not found</p>";
        }
    }

    public function exitAction(){
        session_destroy();
        header('Location: /');
    }
}
