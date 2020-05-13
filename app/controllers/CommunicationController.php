<?php

namespace app\controllers;

use app\core\Controller;
use app\models\validators\ValidContacts;

class CommunicationController  extends Controller{
    
    public function contactsAction(){
        $this->view->render('Контакты', $this->data);
    }
}
