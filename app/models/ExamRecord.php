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

    public function insert($val_arr){

        
        
        // $val = [
        //     [null, "kaida", "2020-05-13 00:22:23.000000", "is",
        //     "dsd", "1", "sdcds", "3", "eccs", "2"],
        //     // [null, "Лена", "2019-05-13 01:12:23.000000", "is",
        //     // "dsd", "1", "вввв", "4", "eccs", "2"],
        // ];
        // echo "<p>".var_dump($val)."</p>";

        $val = [
            array_values($val_arr)
        ];
        // echo "<p>".var_dump($val)."</p>";

        parent::save( $val);
    }

    public function edit(){
        $query = "UPDATE ".static::$tablename." SET 
            `fio` = :fio,
            `date` = :date,
            `course` = :course,
            `answer1` = :answer1,
            `flag1` = :flag1,
            `answer2` = :answer2,
            `flag2` = :flag2,
            `answer3` = :answer3, 
            `flag3` = :flag3  
            WHERE `id` = :id";

        $values = [
            ':id' => 3,
            ':fio' => "Холодова",
            ':date' => "2019-05-13 01:12:23.000000",
            ':course' => "утс",
            ':answer1' => "фото",
            ':flag1' => "1",
            ':answer2' => "вдв",
            ':flag2' => "3",
            ':answer3' => "воыд",
            ':flag3' => "1"
        ];

        parent::update($query, $values);
    }
}
