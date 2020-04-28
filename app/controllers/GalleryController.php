<?php

namespace app\controllers;

use app\core\Controller;

class GalleryController extends Controller{

    public function  fotosAction(){
        $result = $this->model->getData();
        $vars = [
			'args' => $result,
		];
        $this->view->render('Галлерея', $vars);
    }
}