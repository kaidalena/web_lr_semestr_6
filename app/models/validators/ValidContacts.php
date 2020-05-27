<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidContacts extends Validator { 

    public $rules = [
        'name' => "Пример: Иванов Иван Иванович",
        'email' => "Пример: example33@ety.ru",
        'data' => "Нажмитe на поле ввода для выбора даты",
        'phone' => "Пример: +71234567890 / +31234567890",
        'message' => "Текст вашего сообщения",
    ];

    public $errors = [
        'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
        'email' => "E-mail указан не верно",
        'age' => "Выберите свой возраст",
        'emptyData' => "Введите дату рождения",
        'empty' => "Поле не должно быть пустым",
        'notValidData' => "Неверная дата",
        'phone' => "Неверный номер телефона",
    ];

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

    public function check_age($p1) {
        if (preg_match('/^[1-3]{1,1}+$/', $p1)) return null;
        return $this->errors['age']; 
    } 
}