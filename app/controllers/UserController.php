<?php


namespace app\controllers;

use app\core\Controller;
use app\admin\controllers\MainController;
use SimpleXMLElement;

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
        
        if (MainController::login()) {
            header('Location: /admin');    
            return true;
        } 
        $this->model->validator->Validate($_POST);
        if (!$this->model->validator->checkErrors()) return false;
        $this->setUserSession();
        $this->redir();
    }

    public function registration(){
        $this->model->validator->Validate($_POST);
        $this->data['errors'] = $this->model->validator->getErrors();
        if (!$this->model->validator->checkErrors()) return false;
        $this->model->saveUser();
        return true;
    }

    public function check_loginAction(){
        $post = file_get_contents('php://input');
        $login = new SimpleXMLElement($post);
        // echo "parse: ".$login->login[0];
        $result = $this->model->check_exisists_login($login->login[0]);
        if (!$result) echo "Такой логин уже существует";
    }

    public function getFIO(){
        return $this->model->getFIO();
    }

    public function setUserSession(){
        $_SESSION['isAdmin'] = 0;
        $_SESSION['fio'] = $this->model->fio;
        $this->redir();
    }

    public function redir(){
        header('Location: /');
    }
}