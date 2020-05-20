<?php


namespace app\controllers;

use app\core\Controller;


class AuthenticationController extends Controller{

    public function registrationAction(){

        $this->view->render('Регистрация', [ 'controller' => $this]);
    }

    public function login(){
        $this->validator->Validate($_POST);
    }
}