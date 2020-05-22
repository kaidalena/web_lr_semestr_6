<?php


namespace app\controllers;

use app\core\Controller;


class UserController extends Controller{

    public function registrationAction(){

        $this->view->render('Регистрация', [ 'controller' => $this]);
    }

    public function loginAction(){
        $this->view->render('Вход');
    }

    public function login(){
        $_SESSION['isAdmin'] = 0;
        $_SESSION['fio'] = "Kaida Lena";
    }

    public function getFIO(){
        return $this->model->getFIO();
    }
}