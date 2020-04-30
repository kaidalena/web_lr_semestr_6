<?php

namespace app\controllers;

use app\core\Controller;
use app\models\validators\ValidContacts;

class MeController extends Controller{

    public function  aboutAction(){
        $this->model->loadModel();
        $this->view->render('Обо мне');
    }

    public function interestAction(){
        $result = $this->model->loadModel();

        $vars = [
            'names' => $result,
		];
        $this->view->render('Мои интересы', $vars);
    }

    public function contactsAction(){
        $this->model->loadModel();
        
        $var = [
            'valid' => $this->model->validator,
            'rules' => $this->model->validator->getRules(),
            'errors' => $this->model->validator->getErrors(),
            'values'=> $this->model->validator->getErrors(), 
        ];
        $this->view->render('Контакты', $var);
    }
}