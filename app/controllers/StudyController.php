<?php

namespace app\controllers;

use app\core\Controller;
use app\models\validators\ValidTest;

class StudyController extends Controller{

    public function  scheduleAction(){
        $this->view->render('Аккаунт');
    }

    public function  testAction(){
        $valid = new ValidTest();
        $var = [
            'valid' => $valid,
            'rules' => $valid->getRules(),
            'errors' => $valid->getErrors(), 
        ];
        $this->view->render('Аккаунт', $var);
    }
}