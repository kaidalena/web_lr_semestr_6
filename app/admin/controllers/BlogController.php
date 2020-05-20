<?php


namespace app\admin\controllers;

use app\core\Controller;
use app\models\Blog;
use app\models\BlogRecord;


class BlogController extends Controller{

    public function  uploadAction(){
        $this->data['controller'] = $this;
        // echo "<p style='margin: 50px;'> data: </p>";
        // echo "<p>".var_dump($this->data)."</p>";
        $this->view->render('Загрузка Блога', $this->data);
    }

}