<?php


namespace app\controllers;

use app\core\Controller;
use app\admin\controllers\MainAdminController;


class UserController extends Controller{

    public function registrationAction(){
        $this->data['controller'] = $this;
        $this->view->render('Регистрация', $this->data);
    }

    public function loginAction(){
        $this->data['controller'] = $this;
        $this->view->render('Вход', $this->data);
    }

    public function login(){
        if (MainAdminController::authAdmin()) {    //Main Admin Controller   action=auth
            header('Location: /admin');    
            return true;
        } 
        if ($this->model->authUser($_POST)){
            $this->setUserSession();
            $this->redir();
        }
        return false;
    }

    public function registration(){
        $this->model->validator->Validate($_POST);
        $this->data['errors'] = $this->model->validator->getErrors();
        if (!$this->model->validator->checkErrors()) return false;
        $this->model->saveUser();
        return true;
    }

    public function setUserSession(){
        $_SESSION['isAdmin'] = 0;
        $_SESSION['fio'] = $this->model->fio;
    }

    public function redir(){
        header('Location: /');
    }
}