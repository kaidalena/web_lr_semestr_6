<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidBlog extends Validator {

    public function check_topic($p1) {
        if (empty($p1)) return $this->errors['empty'];
        if(preg_match('/^[A-яA-z\s]{1,50}$/', $p1)) return null;
        return $this->errors['topic'];
    }

    public function check_userFile($files){
        if ($files['userFile']['name'] == null  || 
            preg_match("/^image/", $files['userFile']['type'])) return null;
        
        return $this->errors['userFile']; 
    }

}
