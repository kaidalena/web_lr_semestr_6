<?php

namespace app\controllers;

use app\core\Controller;

class BlogController extends Controller{

    public function  uploadAction(){

        $this->view->render('Редактор Блога', $this->data);
    }
}
