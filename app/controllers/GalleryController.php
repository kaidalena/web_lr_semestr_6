<?php

namespace app\controllers;

use app\core\Controller;

class GalleryController extends Controller{

    public function  fotosAction(){
        $vars = [
			'args' => $this->data,
		];
        $this->view->render('Галерея', $vars);
    }
}
