<?php

namespace app\controllers;

use app\core\Controller;

class StudyController extends Controller{

    public function  scheduleAction(){
        $this->view->render('Расписание');
    }
}
