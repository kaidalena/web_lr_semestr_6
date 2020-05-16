<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidBlog;
use app\core\BaseActiveRecordModel;

class Blog extends BaseActiveRecordModel{

    protected static  $tablename = "blog";
    protected static $dbfields = [];
    public static  $pdo;

    public function __construct($action){
        //  echo "<p>Blog Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function send(){

        $this->validator = new ValidBlog();

        return [
           'valid' => $this->validator,
           'rules' => $this->validator->getRules(),
           'errors' => $this->validator->getErrors(),
           'values'=> $this->validator->getErrors()
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
