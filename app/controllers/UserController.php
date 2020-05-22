<?php


namespace app\controllers;

use app\core\Controller;


class UserController extends Controller{

    public function registrationAction(){

        $this->view->render('Регистрация', [ 'controller' => $this]);
    }

    public function loginAction(){
        $this->view->render('Вход', [ 'controller' => $this]);
    }

    public function exitAction(){
        session_destroy();
        $this->redir();
    }

    public function login(){
        $_SESSION['isAdmin'] = 0;
        $_SESSION['fio'] = "Kaida Lena";
        $this->redir();
    }

    public function getFIO(){
        return $this->model->getFIO();
    }

    public function saveUser(){
        $_SESSION['isAdmin'] = 0;
        $_SESSION['fio'] = "Kaida Lena";
        $this->redir();
    }

    public function redir(){
        header('Location: /');
    }
}