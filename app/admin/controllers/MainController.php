<?php

namespace app\admin\controllers;

use app\core\Controller;

class MainController extends Controller{

     public function  indexAction(){
          echo "admin main controller";
         $var = [
             'controller' => $this,
         ];
         $this->view->render('Admin', $var);
     }

     public function login(){
        if (($_POST['login']=='adminadmin@gmail.com') && (md5($_POST['password'])=='d8578edf8458ce06fbc5bb76a58c5ca4')) {
            $_SESSION['isAdmin']=1;
                return true;
            }
            $_SESSION['isAdmin']=0;
            return false;
     }
}
