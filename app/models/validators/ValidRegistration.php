<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidRegistration extends Validator {

    public $rules = [
        'name' => "Пример: Иванов Иван Иванович",
        'email' => "Пример: example33@ety.ru",
        'login' => "Не менее 6 символов",
        'password' => "Не менее 6 символов",
    ];

    public $errors = [
        'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
        'email' => "E-mail указан не верно",
        'empty' => "Поле не должно быть пустым",
        'login' => "Логин должен быть не менее 6 символов",
        'exist_login' => "Такой логин уже существует",
        'password' => "Пароль должен быть не менее 6 символов",
    ];

    public $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function check_login($p1) {
        if (empty($p1)) return $this->errors['empty'];
        if(!$this->model->check_exisists_login($p1)) return $this->errors['exist_login'];
        if(preg_match('/^[A-яA-z0-9\%\$\!\-\_\&\*\#\@\.]{6,50}$/', $p1)) return null;
        return $this->errors['login'];
    }

    public function check_password($p1) {
        if (empty($p1)) return $this->errors['empty'];
        if(preg_match('/^[A-яA-z0-9\%\$\!\-\_\&\*\#\@]{6,50}$/', $p1)) return null;
        return $this->errors['password'];
    }

}