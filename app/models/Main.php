<?php

namespace app\models;

use app\core\Model;

class Main extends Model{

    public function __construct($action){
        parent::__construct($action);
        // echo "<p>Main Model __construct(action)</p>";
    }

    public function indexModel(){

    }
}
