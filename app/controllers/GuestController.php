<?php

namespace app\controllers;

use app\core\Controller;

class GuestController extends Controller{

    public function  bookAction(){
        // echo "<p>guestBookAction</p>";
        $this->view->render('Гостевая книга', $this->data);
         // $this->view->render('Гостевая книга');
    }
}
