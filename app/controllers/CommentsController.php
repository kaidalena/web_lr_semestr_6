<?php


namespace app\controllers;

use app\core\Controller;
use app\models\Comments;

class CommentsController extends Controller{


    public function addCommentAction(){
        header ('Content-Type: text/javascript');
        $status = false;
        $respons = "";
        $row = [];

        if (!empty($_REQUEST['comment'])){
            $commentModel = new Comments(null);
            $row = [null, $_REQUEST['blog'], $_SESSION['id_user'], $_REQUEST['comment'], date('Y-m-d H:i:s')];
            $respons = $commentModel->save([$row]);
            $row[2] = $_SESSION['fio'];
            echo "var data = ".(json_encode($row)).";\n";
            $status = (empty($respons)) ? 0 : 1;
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