<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidGuestBook extends Validator {

    public $rules = [
        'name' => "Пример: Иванов Иван Иванович",
        'email' => "Пример: example33@ety.ru",
        'message' => "Текст вашего сообщения",
    ];

    public $errors = [
        'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
        'email' => "E-mail указан не верно",
        'empty' => "Поле не должно быть пустым",
    ];
}
