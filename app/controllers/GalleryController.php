<?php

namespace app\controllers;

use app\core\Controller;

class GalleryController extends Controller{

    public function  fotosAction(){

        $result = $this->model->loadModel();

        // $result = $this->model->getData();
        $vars = [
			'args' => $result,
		];
        $this->view->render('Галерея', $vars);
    }
}