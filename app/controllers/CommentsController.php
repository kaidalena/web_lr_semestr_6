<?php

namespace app\controllers;

use app\core\Controller;

class CommentsController extends Controller{

    public function  uploadAction(){
        $vars=[
            'model' => $this->model
        ];

        $this->view->render('Загрузка отзывов', $vars);
    }
}
