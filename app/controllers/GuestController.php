<?php

namespace app\controllers;

use app\core\Controller;

class GuestController extends Controller{

     public function  uploadAction(){
         $vars=[
            'model' => $this->model
         ];
         $this->view->render('Загрузка отзывов', $vars);
     }

    public function  bookAction(){
        // echo "<p>guestBookAction</p>";
        $this->data['controller'] = $this;
        $this->view->render('Гостевая книга', $this->data);
         // $this->view->render('Гостевая книга');
    }

    public function save($post_array){
        $respons = [
            $post_array['name'],
            $post_array['email'],
            date('d.m.Y H:i:s'),
            $post_array['message']
        ];
        $this->model->sendRespons("messages.inc", $respons);
    }
}
