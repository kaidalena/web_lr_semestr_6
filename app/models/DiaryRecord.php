<?php

namespace app\models;

use app\core\Model;
use app\core\BaseActiveRecord;
use PDO;

class DiaryRecord extends BaseActiveRecord{

    protected static  $tablename = "diary";
    protected static $dbfields = [];
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

    public function getAll(){
        
    }

}
