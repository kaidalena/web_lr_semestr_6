<?php

namespace app\models;

use app\core\Model;
use app\core\BaseActiveRecord;
use PDO;

class MainRecord extends BaseActiveRecord{

    protected static  $tablename = "main";
    protected static $dbfields = ["kkk", "ll"];
    public static  $pdo;

    public function __construct(){
        parent::__construct();
    }

    public function test(){
        // echo "<p style=\"margin: 50px;\">".parent::getTableName()."</p>";
    }
}
