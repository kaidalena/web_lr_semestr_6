<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidTest;

class Study extends Model{

    public $method;

    function __construct($action){
        parent::__construct($action);
        // echo "<p>Study Model __construct(action)</p>";
    }

    public function schedule(){
        // echo "this is schedule model";
    }

}
