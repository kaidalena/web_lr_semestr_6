<?php

namespace app\controllers;

use app\core\Controller;

class GalleryController extends Controller{

    public function  fotosAction(){

        $result = $this->model->loadModel();

        $vars = [
			'args' => $result,
		];
        $this->view->render('Галерея', $vars);
    }
}