<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Blog;
use app\models\BlogRecord;

class BlogController extends Controller{

    public function  uploadAction(){
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
        
        $data = [
            'id' => null,
            'topic' => (array_key_exists('topic', $post_array) ? trim($post_array['topic']) : null),
            'message' => (array_key_exists('message', $post_array) ? trim($post_array['message']) : null),
            'image' => ($_FILES['userFile']['tmp_name'] != null) ?
                        addslashes(file_get_contents($_FILES['userFile']['tmp_name'])) : null,
            'date' => date('Y-m-d H:i:s')
        ];

        // echo "<p> answers = ".var_dump($ansswers)."</p>";
        $blogDB->insert($data);
    }
}
