<?php

namespace app\admin\controllers;

use app\core\Controller;

class AdminController extends Controller{

    public function __construct($route){
        parent::__construct($route);
        // echo "Admin controller";
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) echo "<br/> is admin";
        $this->authenticate();
    }

    public static function authenticate(){
        if (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin']) {
            header('Location:/admin');
            exit;
        }
    }

}