<?php


namespace app\admin\controllers;

use app\core\Controller;
use app\admin\controllers\AdminController;


class BlogController extends AdminController{

    public function __construct($route)
    {
        parent::__construct($route);
        echo "<br/>BlogController construct";
    }

    public function  uploadAction(){
        $this->data['controller'] = $this;
        // echo "<p style='margin: 50px;'> data: </p>";
        // echo "<p>".var_dump($this->data)."</p>";
        $this->view->render('Загрузка Блога', $this->data);
    }

}