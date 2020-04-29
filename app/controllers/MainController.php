<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller{

    public function indexAction(){
        $result = $this->model->loadModel();
        
        // $result = $this->model->test();
        $vars = [
			'args' => $result,
		];
		$this->view->render('Главная страница', $vars);
    }

}