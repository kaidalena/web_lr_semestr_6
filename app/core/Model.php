<?php

namespace app\core;

use app\core\Db;
use app\models\validators\Validator;

abstract class Model{

     public $method;
     public $validator;

     function __construct($action){
          // echo "<p>Model __construct()</p>";
          $this->method = $action."Model";
    }

    public function loadModel(){
         // echo "<p>loadModel</p>";
        $method = $this->method;
        return $this->$method();
    }
}
