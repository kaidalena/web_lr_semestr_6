<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidGuestBook;

class Guest extends Model{

    public function __construct($action){
         // echo "<p>Guest Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function book(){
         // echo "<p>guestBookModel</p>";
         $rules = [
            'name' => "Пример: Иванов Иван Иванович",
            'email' => "Пример: example33@ety.ru",
            'message' => "Текст вашего сообщения",
        ];

        $errors = [
            'name' => "Имя должно состоять из трех слов и может содержать только русские буквы длиной до 30 символов",
            'email' => "E-mail указан не верно",
            'empty' => "Поле не должно быть пустым",
        ];

        $this->validator = new ValidGuestBook($rules, $errors);

        return [
           'valid' => $this->validator,
           'rules' => $this->validator->getRules(),
           'errors' => $this->validator->getErrors(),
           'values'=> $this->validator->getErrors(),
          //  'comments' => $this->readComments("messages.inc"),
          'comments' => null,
       ];
    }

    public function readComments($nameFile){
         // echo "<script> console.log('one');</script>";

         $file = fopen("public/$nameFile", "r");
         $comments = [];

         // echo "<script> console.log('one'); </script>";

         for( $i=0; !feof($file) ; $i++){
              $str = fgets($file);
              // echo "<script> console.log('". json_encode( $str)."'); </script>";
              if(empty($str)) continue;

              $spitedStr = explode(';', $str);
              $temp = [
                   'fio' => trim($spitedStr[0]),
                   'email' => trim($spitedStr[1]),
                   'date' =>  trim($spitedStr[2]),
                   'msg' => trim($spitedStr[3])
              ];
              // $comments[trim($spitedStr[2])] = [
              //    'fio' => trim($spitedStr[0]),
              //    'email' => trim($spitedStr[1]),
              //    'date' => trim($spitedStr[2]),
              //    'msg' => trim($spitedStr[3])
            // ];
              $comments[$i] = $temp;
         }

         fclose($file);
          // echo "<script> console.log('one'); </script>";
          // echo "<script> console.log('file: ". json_encode( $comments)."'); </script>";

         return $comments;
         // return null;
    }

}
