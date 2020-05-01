<?php

namespace app\controllers;

use app\core\Controller;
use app\models\validators\ValidContacts;

class MeController extends Controller{

    public function  aboutAction(){
        $this->view->render('Обо мне');
    }

    public function interestAction(){
        $vars = [
            'names' => $this->data,
		];
        $this->view->render('Мои интересы', $vars);
    }

    public function contactsAction(){
        $this->view->render('Контакты', $this->data);
    }
}
