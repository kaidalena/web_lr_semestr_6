<?php

namespace app\controllers;

use app\core\Controller;
use app\core\BaseActiveRecord;
use app\models\MainRecord;

class MainController extends Controller{


    public function indexAction(){
        echo "<p>indexAction</p>";


        $vars = [
			'args' => $this->data,
	   ];


       $this->view->render('Главная страница', $vars);
    }

}
