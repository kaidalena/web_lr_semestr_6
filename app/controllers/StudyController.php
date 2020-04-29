<?php

namespace app\controllers;

use app\core\Controller;

class StudyController extends Controller{

    public function  scheduleAction(){
        $this->model->loadModel();
        $this->view->render('Расписание');
    }

    public function  testAction(){
        $this->model->loadModel();
        
        $var = [
            'valid' => $this->model->validator,
            'rules' => $this->model->validator->getRules(),
            'errors' => $this->model->validator->getErrors(), 
        ];
        $this->view->render('Тест', $var);
    }
}