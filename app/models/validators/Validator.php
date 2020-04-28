<?php

namespace app\models\validators;

// use app\core\Controller;

class Validator {

    private $rules = [
        'name' => "Пример: Иванов Иван Иванович",
        'email' => "Пример: example33@ety.ru",
        'data' => "Нажмитe на поле ввода для выбора даты",
        'phone' => "Пример: +71234567890 / +31234567890",
        'message' => "Текст вашего сообщения",
    ];

    private $errors = [
        'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
        'email' => "E-mail указан не верно",
        'age' => "Выберите свой возраст",
        'emptyData' => "Введите дату рождения",
        'empty' => "Поле не должно быть пустым",
        'notValidData' => "Неверная дата",
        'phone' => "Неверный номер телефона",
    ];

    private $errorsGet = [
        'name' => "",
        'email' => "",
        'age' => "",
        'course' => "",
        'data' => "",
        'empty' => "",
        'notValidData' => "",
        'phone' => "",
        'message' => "",
        'question1' => "",
        'question2' => "",
        'question3' => "",
    ];

    public function __construct(){
        
    }

    //preg_match — Выполняет проверку на соответствие регулярному выражению
          
    public function check_name($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^[А-я]{1,10}[\s]{1,3}[А-я]{1,15}[\s]{1,3}[А-я]{1,15}+$/u', $p1)) return null;
        return $this->errors['name']; 
    } 
                
    public function check_email($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^([A-z0-9_\.-]+)@([A-z0-9_\.-]+)\.([A-z\.]{2,6})$/', $p1)) return null;
        return $this->errors['email'];
    }

    public function check_data($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^(0|1)[0-2]{1}[\/]{1}[0-3]{1}[0-9]{1}[\/]{1}[0-9]{4}+$/', $p1)) return null;
        return $this->errors['notValidData'];
    }

    public function check_phone($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^[+]{1}[37]{1}[0-9]{10}+$/', $p1)) return null;
        else return $this->errors['phone'];
    }

    public function check_message($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        return null;
    }

    public function check_age($p1) {
        if (preg_match('/^[1-3]{1,1}+$/', $p1)) return null;
        return $this->errors['age']; 
    } 

    public function check_course($p1) {
        if (preg_match('/^[0-9]{1,2}+$/', $p1)) return null;
        return $this->errors['course']; 
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

    public function SetRule($field_name, $validator_name){
        $this->rules[$field_name] = $validator_name;
    }

    public function checkErrors($errors){
        foreach($errors as $key=>$value){
            if ($value == "" || $value == null ) continue;
            else return false;
        }
        return true;
    }

    public function getErrors(){
        return $this->errorsGet;
    }

    public function getRules(){
        return $this->rules;
    }

    public function validInputColor($teg){
        var_dump($teg);
    }
}