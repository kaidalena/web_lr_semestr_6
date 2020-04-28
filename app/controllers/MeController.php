<?php

namespace app\controllers;

use app\core\Controller;
use app\models\validators\ValidContacts;

class MeController extends Controller{

    public function  aboutAction(){
        
        $this->view->render('Обо мне');
    }

    public function interestAction(){
        $names = $this->model->getTatles();
        // var_dump($names);
        $descriptions = $this->model->getDescriptions();
        $vars = [
            'names' => $names,
            // 'descriptions' => $descriptions
		];
        $this->view->render('Мои интересы', $vars);
    }

    public function contactsAction(){
        $valid = new ValidContacts();
        $var = [
            'valid' => $valid,
            'rules' => $valid->getRules(),
            'errors' => $valid->getErrors(),
            'values'=> $valid->getErrors(), 
        ];
        $this->view->render('Контакты', $var);
    }
}