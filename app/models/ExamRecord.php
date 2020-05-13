<?php

namespace app\models;

use app\core\Model;
use app\core\BaseActiveRecord;
use PDO;

class ExamRecord extends BaseActiveRecord{

    protected static  $tablename = "test";
    protected static $dbfields = [
        "id", "fio", "date", "course", 
        "answer1", "flag1",
        "answer2", "flag2",
        "answer3", "flag3"];
    public static  $pdo;

    public function __construct(){
        parent::__construct();
    }

    public function insert(){

        $val = [
            [null, "kaida", "2020-05-13 00:22:23.000000", "is",
            "dsd", "1", "sdcds", "3", "eccs", "2"],
            [null, "Лена", "2019-05-13 01:12:23.000000", "is",
            "dsd", "1", "вввв", "4", "eccs", "2"],
        ];
        parent::save( $val);
    }
}
