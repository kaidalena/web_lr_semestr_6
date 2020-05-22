<?php

namespace app\models;

use app\core\BaseActiveRecordModel;
use app\models\validators\ValidUser;

class User extends BaseActiveRecordModel{

    protected static  $tablename = "users";
    protected static $dbfields = [];
    public static  $pdo;

    public function __construct($action){
        //  echo "<p>Blog Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function registration(){
        $this->validator = new ValidUser();
    }

    public function login(){
        $this->validator = new ValidUser();
    }

    public function exit(){
        
    }

}