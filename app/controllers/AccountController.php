<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller{

    public function  loginAction(){
        if (!empty($_POST)){
            $this->view->message('exit', 'exit');
        }
        $this->view->render('Аккаунт');
    }

    public function registerAction(){
        $this->view->render('Аккаунт');
    }
}