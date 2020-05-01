<?php

namespace app\core;

use app\core\Db;
use app\models\validators\Validator;

abstract class Model{

     public $method;
     public $validator;

     //запоминаем action
     function __construct($action){
          
          $this->method = $action."Model";
    }

    //загружаем необходимый метод в зависмиости от action: action+"Model" = actionModel();
    public function loadModel(){
        $method = $this->method;
        return $this->$method();
    }
}
