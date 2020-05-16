<?php

namespace app\models;

use app\core\BaseActiveFileModel;
use app\models\validators\ValidGuestBook;

class Comments extends BaseActiveFileModel{

    public function __construct($action){
        //  echo "<p>Comments Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function upload(){
        // echo "this is comments model";
        
    }
}
