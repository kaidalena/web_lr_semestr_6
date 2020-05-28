<?php


namespace app\controllers;

use app\core\Controller;
use app\models\lab4test;
use SimpleXMLElement;


class lab4testController extends Controller{

    public function  testAction(){
        $this->view->render('lab 4');
    }

    public function  sendAction(){
        echo "send Action";
        // $this->model->blog_id = $_POST['blog_id'] ;
        // $this->model->user_id = $_SESSION['user_id'];
        // $this->model->message = $_POST['message'];
        // $this->model->save()
        // $json = "{\"time\": \"22:03:54\", \"errors\": null}";
        // echo $json;

        // $xmlstr = '<form><name>Title</name><fio>Kaida</fio></form>';
        // echo $xmlstr;

        $post = file_get_contents('php://input');
        echo "post: ".$post;

        $profile = new SimpleXMLElement($post);

        echo "parse: ";
        var_dump($profile);
    }
}