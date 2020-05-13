<?php

namespace app\controllers;

use app\core\Controller;

class GuestController extends Controller{

    public function  guestBookAction(){
        // echo "<p>guestBookAction</p>";
        $this->view->render('Гостевая книга', $this->data);
         // $this->view->render('Гостевая книга');
    }

    public function  commentsAction(){
        // $vars = [
		// 	       'args' => $result,
		//     ];
        // $this->view->render('Отзывы', $vars);
    }
}
