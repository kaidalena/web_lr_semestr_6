<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidContacts;

class Communication extends Model{

    public $path;

    function __construct($action){
        parent::__construct($action);
        // echo "<p>Me Model __construct(action)</p>";
    }

    public function contacts(){

        $this->validator = new ValidContacts();

        return  [
            'valid' => $this->validator,
            'rules' => $this->validator->getRules(),
            'errors' => $this->validator->getErrors(),
            'values'=> $this->validator->getErrors(),
        ];
    }

}
