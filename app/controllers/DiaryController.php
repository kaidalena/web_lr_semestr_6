<?php

namespace app\controllers;

use app\core\Controller;
use app\models\DiaryRecord;

class DiaryController extends Controller{

    public function  blogAction(){
        $diaryDB = new DiaryRecord();
        $this->data = [
            'data' => $diaryDB->findAll(),
            'controller' => $this
        ];
        
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
