<?php

namespace app\admin\controllers;

use app\core\Controller;

class GuestController extends Controller{

     public function  uploadAction(){
         $vars=[
            'model' => $this->model
         ];
         $this->view->render('Загрузка отзывов', $vars);
     }
}
