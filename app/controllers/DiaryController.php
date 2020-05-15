<?php

namespace app\controllers;

use app\core\Controller;


class DiaryController extends Controller{

    public function  blogAction(){
        
        $this->data['controller'] = $this;

        // echo "<p style='margin: 50px;'> data: </p>";
        // echo "<p>".var_dump($this->data)."</p>";
        
        $this->view->render('Мой Блог', $this->data);
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
