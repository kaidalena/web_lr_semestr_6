<?php

namespace app\core;

use app\core\Db;
use app\models\validators\Validator;

abstract class Model{

// public $db;
public $validator;

    public function __construct(){
        // $this->db = new Db;
        $validator = new Validator();
    }
}