<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidGuestBook;
use app\core\BaseActiveFileModel;

class Guest extends BaseActiveFileModel{

    public function __construct($action){
         // echo "<p>Guest Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function book(){
         // echo "<p>guestBookModel</p>";

        $this->validator = new ValidGuestBook();

        return [
           'valid' => $this->validator,
           'rules' => $this->validator->getRules(),
           'errors' => $this->validator->getErrors(),
           'values'=> $this->validator->getErrors(),
           'comments' => $this->readComments("messages.inc"),
       ];
    }

//     public function readComments($nameFile){
//          echo "<script> console.log('one');</script>";

//          $file = fopen("public/files/$nameFile", "r");
//          $comments = [];

//          echo "<script> console.log('two'); </script>";

//          for( $i=0; !feof($file) ; $i++){
//               $str = fgets($file);
              
//               if(empty($str)) continue;

//               echo "<script> console.log('". json_encode( $str)."'); </script>";
//               $spitedStr = explode(';', $str);
//               $temp = [
//                    'fio' => trim($spitedStr[0]),
//                    'email' => trim($spitedStr[1]),
//                    'date' =>  trim($spitedStr[2]),
//                    'msg' => trim($spitedStr[3])
//               ];
//               $comments[$i] = $temp;
//          }

//          fclose($file);
          
//          usort($comments, function($first, $second){
//                $first = DateTime::createFromFormat('d.m.Y H:i:s', $first['date']);
//                $second = DateTime::createFromFormat('d.m.Y H:i:s', $second['date']);

//                return $first < $second;
//          });

//          return $comments;
//     }

//     public function sendRespons($nameFile, $respons){
//           $file = fopen("public/$nameFile", "a");
//           foreach( $respons as $temp){
//                fwrite($file, $temp."; ");
//           }
//           fwrite($file, "\n");
//           fclose($file);
//     }

}
