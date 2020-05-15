<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidTest extends Validator {

    public $rules = [
        'name' => "Пример: Иванов Иван Иванович",
        'course' => "Выберите вариант",
        'question1' => "Выберите правильный ответ",
        'question2' => "Введите ответ",
        'question3' => "Выберите правильные ответы",
    ];

    public $errors = [
        'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
        'course' => "Выберите курс",
        'empty' => "Поле не должно быть пустым",
        'emptyAnswer' => "Введите ответ",
        'incorrectly' => "Не верно",
    ];

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