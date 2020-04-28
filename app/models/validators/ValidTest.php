<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidTest extends Validator {

    private $error = "Введите ответ";
    private $incorrectly = "Не верно";

    public function check_q1($value){
        // echo $value;
        if (preg_match('/^[1-6]{1,1}+$/', $value)){
            if ($value == 2) return null;
            else return $this->incorrectly;
        } else return $this->error; 
    }

    public function check_q2($value){
        if ($value != "" && $value != null){
            if ($value == "Фотосинтез" || $value == "фотосинтез") return null;
            else return $this->incorrectly;
        }else return $this->error; 
    }

    public function check_q3($value){
        
        if (!empty($value)){
            if (count($value)==2){
                if ($value[0]==1 && $value[1]==2) return null;
                else return $this->incorrectly;
            }else return $this->incorrectly;
        }else return $this->error;
        
    }

    public function Validate($post_array){
    
        $this->errorsGet['name'] = $this->check_name($post_array['name']);
        $this->errorsGet['course'] = $this->check_course($post_array['course']);
        $this->errorsGet['question1'] = $this->check_q1($post_array['question1']);
        $this->errorsGet['question2'] = $this->check_q2($post_array['question2']);
        if (array_key_exists('question3', $post_array)){
            $this->errorsGet['question3'] = $this->check_q3($post_array['question3']);
        } else $this->errorsGet['question3'] = $this->error;
        
    }
}