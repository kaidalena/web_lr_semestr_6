<?php


namespace app\admin\controllers;

use app\core\Controller;
use app\admin\controllers\AdminController;


class BlogController extends Controller{

    public function  uploadAction(){
        AdminController::authenticate();
        $this->data['controller'] = $this;
        // echo "<p style='margin: 50px;'> data: </p>";
        // echo "<p>".var_dump($this->data)."</p>";
        $this->view->render('Загрузка Блога', $this->data);
    }

}