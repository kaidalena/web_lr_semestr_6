<?php

namespace app\controllers;

use app\core\Controller;


class RecordsController extends Controller{

    public function  uploadAction(){
        
        $this->data['controller'] = $this;

        // echo "<p style='margin: 50px;'> data: </p>";
        // echo "<p>".var_dump($this->data)."</p>";
        
        $this->view->render('Мой Блог', $this->data);
    }

}
