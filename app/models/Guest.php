<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidGuestBook;
use app\core\BaseActiveFileModel;

class Guest extends BaseActiveFileModel{

    public function __construct($action){
         // echo "<p>Guest Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function book(){
         // echo "<p>guestBookModel</p>";

        $this->validator = new ValidGuestBook();

        return [
           'valid' => $this->validator,
           'rules' => $this->validator->getRules(),
           'errors' => $this->validator->getErrors(),
           'values'=> $this->validator->getErrors(),
           'comments' => $this->readComments("messages.inc"),
       ];
    }

    public function upload(){
        // echo "this is Guest model";
    }
}
