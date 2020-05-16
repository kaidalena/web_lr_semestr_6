<?php

namespace app\controllers;

use app\core\Controller;


class RecordsController extends Controller{

    public function  uploadAction(){

        $this->data['controller'] = $this;

        // echo "<p style='margin: 50px;'> data: </p>";
        // echo "<p>".var_dump($this->data)."</p>";

        $this->view->render('Загрузка Блога', $this->data);
    }

    public function saveRecords($nameField){

        // echo "<p style=\"margin: 50px;\">\$_FILES: "; var_dump($FILES); echo "</p>";

        if (!empty($_FILES)){
            $file = "D:/web/websitePHP/public/files/".$_FILES[$nameField]['name'];
        //     // echo "<br/>file = $file <br/>";
            if($_FILES[$nameField]['error'] == UPLOAD_ERR_OK){
                move_uploaded_file($_FILES[$nameField]['tmp_name'], $file);
                return $this->model->save($file);
            }
        }

        return "Ошибка загрузки";
    }

}
