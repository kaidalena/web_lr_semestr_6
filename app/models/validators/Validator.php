<?php

namespace app\models\validators;

// use app\core\Controller;

class Validator {

    protected $rules = [ ];

    protected $errors = [];

    protected $findErrors = [];

    //preg_match — Выполняет проверку на соответствие регулярному выражению

    // function __construct($rules, $errors){
    //     foreach($rules as $key=>$val){
    //         $this->setRule($key, $val);
    //     }

    //     foreach($errors as $key=>$val){
    //         $this->setError($key, $val);
    //     }
    // }

    function __construct(){
        foreach($this->rules as $key=>$val){
            $this->setRule($key, $val);
        }

        foreach($this->errors as $key=>$val){
            $this->setError($key, $val);
        }
    }

    public function Validate($post_array){

        foreach($this->rules as $field => $rule){
            if (array_key_exists($field, $post_array)){
                $method = "check_".$field;
                // echo $method;
                $this->findErrors[$field] = $this->$method($post_array[$field]);
            }
        }

    }

    public function setRule($field_name, $validator_name){
        $this->rules[$field_name] = $validator_name;
    }

    public function setError($field_name, $error_name){
        $this->errors[$field_name] = $error_name;
    }

    public function checkErrors(){

        foreach ($this->findErrors as $key=>$val){
            if ( $val == "" || $val == null) continue;
            else return false;
        }
        return true;
    }

    public function getErrors(){
        return $this->findErrors;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRule($key){

        if (array_key_exists($key, $this->rules)) return $this->rules[$key];
        else return false;
    }

    public function getError($key){
        if (array_key_exists($key, $this->findErrors)) return $this->findErrors[$key];
        else return false;
    }

    public function check_name($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^[А-я]{1,20}[\s]{1,3}[А-я]{1,20}[\s]{1,3}[А-я]{1,20}+$/u', $p1)) return null;
        return $this->errors['name'];
    }


    public function check_course($p1) {
        // if (preg_match('/^[0-9]{1,2}+$/', $p1)) return null;
        if (preg_match('/^[А-я0-9-]{1,8}+$/', $p1)) return null;
        return $this->errors['empty'];
    }

    public function isNotEmpty($data){
        if ($data != "" && $data != null) return true;
        return false;
    }

    public function isInteger($data){
        if (is_int($data)) return null;
        return $this->errors['notValidData'];
    }

    public function isLess($data, $value){
        if (preg_match('/^[0-9]{3,30}+$/', $data))
            if ($data >= $value) return null;
        return $this->errors['notValidData'];
    }

    public function isGreater($data, $value){
        if (preg_match('/^[0-9]{3,30}+$/', $data))
            if ($data <= $value) return null;
        return $this->errors['notValidData'];
    }

    public function check_email($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^([A-z0-9_\.-]+)@([A-z0-9_\.-]+)\.([A-z\.]{2,6})$/', $p1)) return null;
        return $this->errors['email'];
    }

    public function check_message($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        return null;
    }

}
