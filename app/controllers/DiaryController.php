<?php

namespace app\controllers;

use app\core\Controller;

class DiaryController extends Controller{

    public function  blogAction(){
        // echo "<p>blogAction</p>";
        $this->data['controller'] = $this;
        $this->view->render('Мой Блог');
    }

    public function save($post_array){
        // $respons = [
        //     $post_array['name'],
        //     $post_array['email'],
        //     date('d.m.Y H:i:s'),
        //     $post_array['message']
        // ];
        // $this->model->sendRespons("messages.inc", $respons);
    }
}
