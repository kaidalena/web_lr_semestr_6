<?php

namespace app\controllers;

use app\core\Controller;
use app\models\validators\ValidContacts;

class MeController extends Controller{

    public function  aboutAction(){
        $this->view->render('Обо мне');
    }
}
