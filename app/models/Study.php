<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidTest;

class Study extends Model{

    public $method;

    function __construct($action)
    {
        $this->method = $action."Model";
    }

    public function loadModel(){
        $method = $this->method;
        return $this->$method(); 
    }

    public function scheduleModel(){
        // echo "this is schedule model";
    }

    public function testModel(){
        $this->validator = new ValidTest();
        // echo "this is test model";
    }

}