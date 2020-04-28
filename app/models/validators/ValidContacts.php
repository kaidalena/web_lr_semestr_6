<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidContacts extends Validator {

    public function Validate($post_array){
        $this->errorsGet['name'] = $this->check_name($post_array['name']);
        $this->errorsGet['email'] = $this->check_email($post_array['email']);
        if (array_key_exists('data', $post_array)) $this->errorsGet['data'] = $this->check_data($post_array['data']);
        else $this->errorsGet['data'] = $this->errors['emptyData'];
        $this->errorsGet['age'] = $this->check_age($post_array['age']);
        $this->errorsGet['course'] = $this->check_course($post_array['course']);
        $this->errorsGet['phone'] = $this->check_phone($post_array['phone']);
        if (array_key_exists('message', $post_array)) $this->errorsGet['message'] = $this->check_message($post_array['message']);
        else $this->errorsGet['message'] = $this->errors['empty'];
    }
}