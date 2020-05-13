<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidContacts;

class Me extends Model{

    public $path;

    function __construct($action){
        parent::__construct($action);
        // echo "<p>Me Model __construct(action)</p>";
    }

    public function about(){
        // echo "this is about model";
    }
    
}
