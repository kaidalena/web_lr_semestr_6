<?php

namespace app\admin\controllers;

use app\core\Controller;

class AdminController extends Controller{

    public static function authenticate(){
        if (!isset($_SESSION['isAdmin'])) {
            header('Location:/authorization/index');
            exit;
        }
    }

}