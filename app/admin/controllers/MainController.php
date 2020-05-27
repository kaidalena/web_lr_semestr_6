<?php

namespace app\admin\controllers;

use app\core\Controller;

class MainController extends Controller{

    public function __construct($route)
    {
        parent::__construct($route);
        // echo "<br/> MainController constract <br/>";
    }

     public function  indexAction(){
         $var = [
             'controller' => $this,
         ];
         $this->view->render('Admin', $var);
     }

     public static function login(){
        if (($_POST['login']=='adminadmin@gmail.com') && (md5($_POST['password'])=='21232f297a57a5a743894a0e4a801fc3')) { //admin
            $_SESSION['isAdmin']=1;
            return true;
        }
        return false;
     }
}
