<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidBlog;

class Blog extends Model{

    public function __construct($action){
        //  echo "<p>Comments Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function upload(){

        $rules = [
            'topic' => "Максимальная длина 50 символов",
            'userFile' => "Выберите изображение",
            'message' => "Текст вашего сообщения",
        ];

        $errors = [
            'topic' => "Только символы кирилицы и латиницы длиной до 50 символов",
            'userFile' => "Неверный формат файла",
            'message' => "Введите свое сообщение",
            'empty' => "Поле не должно быть пустым",
        ];

        $this->validator = new ValidBlog($rules, $errors);

        return [
           'valid' => $this->validator,
           'rules' => $this->validator->getRules(),
           'errors' => $this->validator->getErrors(),
           'values'=> $this->validator->getErrors()
       ];
        // echo "this is comments model";
        
    }

    
}
