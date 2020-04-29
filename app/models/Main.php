<?php

namespace app\models;

use app\core\Model;

class Main extends Model{

    public $method;

    function __construct($action)
    {
        $this->method = $action."Model";
    }

    public function loadModel(){
        $method = $this->method;
        return $this->$method(); 
    }

    public function indexModel(){
        
        echo "this is index model";
        // $result = $this->db->row('SELECT text, description FROM test');
        // var_dump($result);
        // return $result;
    }

}