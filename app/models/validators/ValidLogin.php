<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidLogin extends Validator {

    public $rules =[
        'login' => "Не менее 6 символов",
        'password' => "Не менее 6 символов",
    ];

    public $errors = [
        'empty' => "Поле не должно быть пустым",
        'login' => "Неверный логин",
        'password' => "Неверный пароль",
    ];

    private $login;
    public $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function check_login($p1) {
        if (empty($p1)) return $this->errors['empty'];
        if($this->model->check_exisists_login($p1)) return $this->errors['login'];
        $this->login = $p1;
    }

    public function check_password($p1) {
        if (empty($p1)) return $this->errors['empty'];
        if(!$this->model->check_exisists_login_password($this->login, $p1)) return $this->errors['password'];
    }
}