<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidBlog;
use app\models\BaseActiveRecordModel;

class Blog extends BaseActiveRecordModel{

    public function __construct($action){
         echo "<p>Blog Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function send(){

        // $rules = [
        //     'topic' => "Максимальная длина 50 символов",
        //     'userFile' => "Выберите изображение",
        //     'message' => "Текст вашего сообщения",
        // ];
        //
        // $errors = [
        //     'topic' => "Только символы кирилицы и латиницы длиной до 50 символов",
        //     'userFile' => "Неверный формат файла",
        //     'message' => "Введите свое сообщение",
        //     'empty' => "Поле не должно быть пустым",
        // ];

        $this->validator = new ValidBlog();

        return [
           'valid' => $this->validator,
           'rules' => $this->validator->getRules(),
           'errors' => $this->validator->getErrors(),
           'values'=> $this->validator->getErrors()
       ];

    }


}
