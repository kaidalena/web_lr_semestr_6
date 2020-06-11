<?php

namespace App\Http\Controllers;

use App\Comment;
use app\models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller{

    public function addComment(){
        header ('Content-Type: text/javascript');
        $status = false;
        $respons = "";
        $row = [];

        if (!empty($_REQUEST['comment'])){
            $commentModel = new Comment();

            $commentModel->id_blog = $_REQUEST['blog'];
            $commentModel->id_user = $_SESSION['id_user'];
            $commentModel->message = $_REQUEST['comment'];

            $status = $commentModel->save();

            $row = [null, $_REQUEST['blog'], $_SESSION['id_user'], $_REQUEST['comment'], date('Y-m-d H:i:s')];
            // $respons = $commentModel->save([$row]);
            // $row[2] = $_SESSION['fio'];
            echo "var data = ".(json_encode($row)).";\n";
            // $status = (empty($respons)) ? 0 : 1;
            $respons = ($status) ? "'Комментарий сохранен'" : "'Ошибка сохранения комментария'";
       }else{
            $status = 0;
            $respons = "'Введите комментарий'";
       }

        echo "var status = ".$status.";\n";
        echo "var respons = ".$respons.";\n";
        echo "responsAddComment();\n";
       exit;
    }
}
