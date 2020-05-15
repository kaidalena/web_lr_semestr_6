<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Blog;
use app\models\BlogRecord;

class BlogController extends Controller{

    public function  sendAction(){
        $this->data['controller'] = $this;
        $this->view->render('Редактор Блога', $this->data);
    }


    public function save($post_array, $files_array){
        $blogDB = new BlogRecord();
        $post_array['userFile'] = $files_array;
        $this->data['valid']->Validate($post_array);

        $errors = $this->model->validator->getErrors();
        // echo "<p> ошибки = ".var_dump($errors)."</p>";

        if(!$this->data['valid']->checkErrors()) return;

        if($files_array['userFile']['error'] == UPLOAD_ERR_OK){
            $upload_image = $files_array["userFile"]["name"];
            $folder="D:/web/websitePHP/public/assets/img/";
            move_uploaded_file($files_array["userFile"]["tmp_name"], $folder.$upload_image);
        }
        
        // echo "<p> save record blog </p>";
        $data = [
            'id' => null,
            'topic' => (array_key_exists('topic', $post_array) ? trim($post_array['topic']) : null),
            'message' => (array_key_exists('message', $post_array) ? trim($post_array['message']) : null),
            'img name' => ($files_array['userFile']['error'] == UPLOAD_ERR_OK) ?
                            $files_array['userFile']['name'] : null,
            'img src' => ($files_array['userFile']['error'] == UPLOAD_ERR_OK) ?
                            '/public/assets/img/': null,
            'date' => date('Y-m-d H:i:s')
        ];

        // echo "<p> answers = ".var_dump($ansswers)."</p>";
        $blogDB->insert($data);
    }
}
