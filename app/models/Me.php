<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidContacts;

class Me extends Model{

    public $path;

    function __construct($action){
        parent::__construct($action);
        // echo "<p>Me Model __construct(action)</p>";
    }

    public function aboutModel(){
        // echo "this is about model";
    }

    public function contactsModel(){
        $rules = [
            'name' => "Пример: Иванов Иван Иванович",
            'email' => "Пример: example33@ety.ru",
            'data' => "Нажмитe на поле ввода для выбора даты",
            'phone' => "Пример: +71234567890 / +31234567890",
            'message' => "Текст вашего сообщения",
        ];

        $errors = [
            'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
            'email' => "E-mail указан не верно",
            'age' => "Выберите свой возраст",
            'emptyData' => "Введите дату рождения",
            'empty' => "Поле не должно быть пустым",
            'notValidData' => "Неверная дата",
            'phone' => "Неверный номер телефона",
        ];

        $this->validator = new ValidContacts($rules, $errors);

        return  [
            'valid' => $this->validator,
            'rules' => $this->validator->getRules(),
            'errors' => $this->validator->getErrors(),
            'values'=> $this->validator->getErrors(),
        ];
    }

    public function interestModel(){

        $result = [
            [
                'src' => "book",
                'name' => 'Любимая книга',
                'description' => "Представьте себе ровное, как стол место, вымощенное камнем. Вокруг него высоченные стены. За стенами - Лабиринт.",
            ],

            [
                'src' => "film",
                'name' => 'Любимый фильм',
                'description' => "Преуспевающий бизнесмен получает в наследство шестерых пингвинов и буквально влюбляется в них.",
            ],

            [
                'src' => "sport",
                'name' => 'Любимый вид спорта',
                'description' => "Есть разнообразное количество видов бега, как двигательной активности, которой занимаются профессиональные атлеты и многие люди, заботящиеся о здоровье и физической форме."
            ]

        ];

        return $result;
    }

}
