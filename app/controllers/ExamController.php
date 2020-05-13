<?php

namespace app\controllers;

use app\core\Controller;

class ExamController extends Controller{

    public function  testAction(){
        $this->view->render('Тест', $this->data);
    }
}
