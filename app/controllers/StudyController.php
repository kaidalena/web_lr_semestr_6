<?php

namespace app\controllers;

use app\core\Controller;
use app\models\validators\ValidTest;

class StudyController extends Controller{

    public function  scheduleAction(){
        $this->model->loadModel();
        $this->view->render('Аккаунт');
    }

    public function  testAction(){
        $this->model->loadModel();
        
        // $valid = new ValidTest();
        $var = [
            'valid' => $this->model->validator,
            'rules' => $this->model->validator->getRules(),
            'errors' => $this->model->validator->getErrors(), 
        ];
        $this->view->render('Аккаунт', $var);
    }
}