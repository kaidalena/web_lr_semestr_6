<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidTest extends Validator {

    public function check_question1($value){
        if ($value != null){
            if ( strcasecmp($value, "Абиотическими") === 0) return null;
            else return $this->errors['incorrectly'];
        } else return $this->errors['emptyAnswer']; 
    }

    public function check_question2($value){
        if ($value != "" && $value != null){
            if ($value == "Фотосинтез" || $value == "фотосинтез") return null;
            else return $this->errors['incorrectly'];
        }else return $this->errors['emptyAnswer'];  
    }

    public function check_question3($value){
        if (!empty($value)){
            if (count($value)==2){
                if (strcasecmp($value[0], "Физическое")===0 && 
                    strcasecmp($value[1], "Xимическое")===0) return null;
                else return $this->errors['incorrectly'];
            }else return $this->errors['incorrectly'];
        }else return $this->errors['emptyAnswer']; 
        
    }

    public function Validate($post_array){

        
        foreach($this->rules as $field => $rule){
            if (array_key_exists($field, $post_array)){
                $method = "check_".$field;
                // echo $method;
                $this->findErrors[$field] = $this->$method($post_array[$field]);
            }
        }

        if (!array_key_exists('question3', $post_array))  $this->findErrors['question3'] = $this->check_question3(null);
    
    }
}