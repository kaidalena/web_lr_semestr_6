<?php

namespace app\controllers;

use app\core\Controller;
use app\models\ExamRecord;

class ExamController extends Controller{

    public $examBD;

    public function  testAction(){
        $this->data['controller'] = $this;
        $this->view->render('Тест', $this->data);
    }

    public function sendResults($post_array){
        $errors = $this->model->validator->getErrors();
        // echo "<p> ошибки = ".var_dump($errors)."</p>";

        if($errors['name'] != null) return;

        $examBD = new ExamRecord();

        function getAnswer3($post_array){
            if (array_key_exists('question3', $post_array)){
                $answer3 = "";
                foreach($post_array['question3'] as $val){
                    $answer3 = $answer3."  ".$val;
                }
                return $answer3;
            }
            return null;
        }
        

        $ansswers = [
            'id' => null,
            'fio' => (array_key_exists('name', $post_array) ? $post_array['name'] : null),
            'date' => date('Y-m-d H:i:s'),
            'course' => (array_key_exists('course', $post_array) ? $post_array['course'] : null),
            'answer1' => (array_key_exists('question1', $post_array) ? $post_array['question1'] : null),
            'flag1' => (($errors['question1'] === null) ? 1 : 0),
            'answer2' => (array_key_exists('question2', $post_array) ? $post_array['question2'] : null),
            'flag2' => (($errors['question2'] === null) ? 1 : 0),
            // 'answer3' => (array_key_exists('question3', $post_array) ? $post_array['question3'] : null),
            'answer3' => getAnswer3($post_array),
            'flag3' => (($errors['question3'] === null) ? 1 : 0),
        ];

        // echo "<p>".var_dump($ansswers)."</p>";
        ExamRecord::insert($ansswers);
    }
}
