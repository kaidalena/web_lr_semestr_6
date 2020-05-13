<?php

namespace app\controllers;

use app\core\Controller;


class MyInterestsController extends Controller{


    public function interestsAction(){
        $vars = [
            'names' => $this->data,
		];
        $this->view->render('Мои интересы', $vars);
    }

}
