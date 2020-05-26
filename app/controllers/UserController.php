<?php


namespace app\controllers;

use app\core\Controller;
use app\admin\controllers\MainController;


class UserController extends Controller{

    public function registrationAction(){

        $this->view->render('Регистрация', [ 'controller' => $this]);
    }

    public function loginAction(){
        $this->view->render('Вход', [ 'controller' => $this]);
    }

    public function login(){
        if (MainController::login()) {
            header('Location: /admin');    
            return true;
        } 
        $_SESSION['isAdmin'] = 0;
        $_SESSION['fio'] = "Kaida Lena";
        $this->redir();
        return false;
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