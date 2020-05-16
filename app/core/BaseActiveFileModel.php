<?php

namespace app\core;

use DateTime;

abstract class BaseActiveFileModel extends Model{

    public function __construct($action) {
         parent::__construct($action);
        echo "<script> console.log('BaseActiveFile constructor'); </script>";
    }

    public function readComments($nameFile){
        echo "<script> console.log('one');</script>";

        $file = fopen("public/files/$nameFile", "r");
        $comments = [];

        echo "<script> console.log('two'); </script>";

        for( $i=0; !feof($file) ; $i++){
             $str = fgets($file);
             
             if(empty($str)) continue;

             echo "<script> console.log('". json_encode( $str)."'); </script>";
             $spitedStr = explode(';', $str);
             $temp = [
                  'fio' => trim($spitedStr[0]),
                  'email' => trim($spitedStr[1]),
                  'date' =>  trim($spitedStr[2]),
                  'msg' => trim($spitedStr[3])
             ];
             $comments[$i] = $temp;
        }

        fclose($file);
         
        usort($comments, function($first, $second){
              $first = DateTime::createFromFormat('d.m.Y H:i:s', $first['date']);
              $second = DateTime::createFromFormat('d.m.Y H:i:s', $second['date']);

              return $first < $second;
        });

        return $comments;
   }

   public function sendRespons($nameFile, $respons){
         $file = fopen("public/files/$nameFile", "a");
         foreach( $respons as $temp){
              fwrite($file, $temp."; ");
         }
         fwrite($file, "\n");
         fclose($file);
   }

   public function loadGuestBook($FILES, $nameField){

        // echo "<p style=\"margin: 50px;\">\$_FILES: "; var_dump($FILES); echo "</p>";

        if (!empty($FILES)){
            $file = "D:/web/websitePHP/public/files/".$_FILES[$nameField]['name'];
            // echo "<br/>file = $file <br/>";
            if($_FILES[$nameField]['error'] == UPLOAD_ERR_OK){
                move_uploaded_file($_FILES[$nameField]['tmp_name'], $file);
                // echo "Загруженный файл: ".$_FILES[$nameField]['name']."</br>";
                // echo "Размер: ".$_FILES[$nameField]['size']."байт";
                return "Загрузка прошла успешно";
            }
        }

        return "Ошибка загрузки";
    }
}
