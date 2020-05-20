<?php


namespace app\admin\controllers;

use app\core\Controller;


class StatisticController extends Controller{

    public function  visitingsAction(){
        $this->data['controller'] = $this;
        // echo "<p style='margin: 50px;'> data: </p>";
        // echo "<p>".var_dump($this->data)."</p>";
        $this->view->render('Статистика посещений', $this->data);
    }

}