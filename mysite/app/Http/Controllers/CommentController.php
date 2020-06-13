<?php

namespace App\Http\Controllers;

use App\Comment;
use app\models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller{

    public function create(){
        header ('Content-Type: text/javascript');
        $status = false;
        $respons = "";
        $row = [];

        if (!empty($_REQUEST['comment'])){
            $commentModel = new Comment();

            $commentModel->id_blog = $_REQUEST['blog'];
            $commentModel->id_user =  Auth::id();
            $commentModel->message = $_REQUEST['comment'];

            $status = $commentModel->save();

            $row = [null, $_REQUEST['blog'], Auth::id(), $_REQUEST['comment'], date('Y-m-d H:i:s')];
            echo "var data = ".(json_encode($row)).";\n";
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
