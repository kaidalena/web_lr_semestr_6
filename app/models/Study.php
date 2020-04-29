<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidTest;

class Study extends Model{

    public $method;

    function __construct($action)
    {
        $this->method = $action."Model";
    }

    public function loadModel(){
        $method = $this->method;
        return $this->$method(); 
    }

    public function scheduleModel(){
        // echo "this is schedule model";
    }

    public function testModel(){
        $rules = [
            'name' => "Пример: Иванов Иван Иванович",
            'question1' => "Выберите правильный ответ",
            'question2' => "Введите ответ",
            'question3' => "Выберите правильные ответы",
        ];

        $errors = [
            'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
            'empty' => "Поле не должно быть пустым",
            'emptyAnswer' => "Введите ответ",
            'incorrectly' => "Не верно",
        ];

        $this->validator = new ValidTest($rules, $errors);
        // echo "this is test model";
    }

}