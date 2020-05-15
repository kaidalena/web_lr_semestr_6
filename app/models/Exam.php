<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidTest;


class Exam extends Model{

    public $method;

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
        ];
    }

}
