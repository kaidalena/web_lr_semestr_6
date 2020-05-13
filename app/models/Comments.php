<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidGuestBook;

class Comments extends Model{

    public function __construct($action){
        //  echo "<p>Comments Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function upload(){
        // echo "this is comments model";
        
    }

    public function loadGuestBook($FILES, $nameField){

        // echo "<p style=\"margin: 50px;\">\$_FILES: "; var_dump($FILES); echo "</p>";

        if (!empty($FILES)){
            $file = "D:/web/websitePHP/public/".$_FILES[$nameField]['name'];
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
