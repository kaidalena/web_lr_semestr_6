<?php

namespace app\admin\controllers;

use app\core\Controller;

class MainAdminController extends Controller{       //Main admin

    public function __construct($route){
        parent::__construct($route);
    }

     public function  indexAction(){
          echo "admin main controller";
         $var = [
             'controller' => $this,
         ];
         $this->view->render('Admin', $var);
     }

     public static function authAdmin(){
        if (($_POST['login']=='adminadmin@gmail.com') && (md5($_POST['password'])=='21232f297a57a5a743894a0e4a801fc3')) { //admin
            $_SESSION['isAdmin']=1;
            return true;
        }
        return false;
     }
}
