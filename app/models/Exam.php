<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidTest;


class Exam extends Model{

    public $method;

    function __construct($action){
        parent::__construct($action);
        // echo "<p>Study Model __construct(action)</p>";
    }

    public function test(){

        
        // $examBD->edit();


        $rules = [
            'name' => "Пример: Иванов Иван Иванович",
            'course' => "Выберите вариант",
            'question1' => "Выберите правильный ответ",
            'question2' => "Введите ответ",
            'question3' => "Выберите правильные ответы",
        ];

        $errors = [
            'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
            'course' => "Выберите курс",
            'empty' => "Поле не должно быть пустым",
            'emptyAnswer' => "Введите ответ",
            'incorrectly' => "Не верно",
        ];

        $this->validator = new ValidTest($rules, $errors);
        return [
            'valid' => $this->validator,
            'rules' => $this->validator->getRules(),
            'errors' => $this->validator->getErrors(),
        ];
    }

}
