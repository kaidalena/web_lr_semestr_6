<?php

namespace app\models;

use app\core\Model;

class lab4test extends Model{

    public function __construct($action){
        //  echo "<p>lab4test Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function test(){}
    public function send(){}
}