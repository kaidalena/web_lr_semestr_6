<?php


namespace app\controllers;

use app\core\Controller;
use app\models\Blog;
use app\models\BlogRecord;
use app\models\Comments;
use app\models\User;


class BlogController extends Controller{


    public function  sendAction(){
        $this->data['controller'] = $this;
        $this->view->render('Редактор Блога', $this->data);
    }


    public function  blogAction(){
        $this->data['controller'] = $this;
        $commentModel = new Comments(null);
        $userModel = new User(null);
        $this->connectDataWithComments($commentModel->selectAll(), $userModel->findAll());
        $this->view->render('Мой Блог', $this->data);
    }

    public function connectDataWithComments($comments, $users){
        $j=0;
        foreach ($comments as $record){
            foreach($users as $one){
                if ($record['id_user'] === $one['id'])
                    $comments[$j]['user'] = $one['name'];
            }
            $j++;
        }

        foreach ($comments as $record){
            for($i=0; $i<count($this->data['rows']); $i++){
                if ($this->data['rows'][$i]['id'] == $record['id_blog']){
                    $j = (empty($this->data['rows'][$i]['comments'])) ? 0 : count($this->data['rows'][$i]['comments']);
                    $this->data['rows'][$i]['comments'][$j] = $record;
                }
            }
        }
    }

    public function saveRecords($nameField){
        if (!empty($_FILES)){
           $file = "D:/web/websitePHP/public/files/".$_FILES[$nameField]['name'];
           if($_FILES[$nameField]['error'] == UPLOAD_ERR_OK){
                move_uploaded_file($_FILES[$nameField]['tmp_name'], $file);
                return $this->model->importFromFile($file);
           }
        }

        return "Ошибка загрузки";
    }

    public function updateRecordAction(){
        header('Content-Type: application/json');
        $newData = (array) json_decode(file_get_contents('php://input'));
        $result = $this->model->save($newData);
        //возвращаем json
        $status =  ($result) ? 1 : 0;
        echo "{ \"status\": \"$status\"}";
    }

    public function save($post_array, $files_array){

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
        $this->model->insert($data);
    }
}
