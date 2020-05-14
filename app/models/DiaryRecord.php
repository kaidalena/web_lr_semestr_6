<?php

namespace app\models;

use app\core\Model;
use app\core\BaseActiveRecord;
use PDO;

class DiaryRecord extends BaseActiveRecord{

    protected static  $tablename = "blog";
    protected static $dbfields = [];
    public static  $pdo;

    public function __construct(){
        parent::__construct();

    }

}
