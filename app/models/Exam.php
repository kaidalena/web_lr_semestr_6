<?php

namespace app\models;

use app\core\BaseActiveRecordModel;
use app\models\validators\ValidTest;


class Exam extends BaseActiveRecordModel{

    public $method;
    protected static  $tablename = "test";
    protected static $dbfields = [];
    public static  $pdo;

    function __construct($action){
        parent::__construct($action);
        // echo "<p>Study Model __construct(action)</p>";
    }

    public function test(){

        $this->validator = new ValidTest();
        return [
            'valid' => $this->validator,
            'rules' => $this->validator->getRules(),
            'errors' => $this->validator->getErrors(),
            'results' => parent::findAll(),
            'user' => (isset($_SESSION['fio']) || $_SESSION['isAdmin'])
        ];
    }

    public function insert($val_arr){
        $val = [
            array_values($val_arr)
        ];
        // echo "<p>".var_dump($val)."</p>";

        parent::save( $val);
    }
}
