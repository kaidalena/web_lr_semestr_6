<?php


use app\core\Router;

    // var_dump($_SERVER);

    spl_autoload_register(function($class) {
        $path = str_replace('\\', '/', $class.'.php');
        if (file_exists($path)) {
            // echo 'autoload class ';
            // var_dump($path);
            require $path;
        }
    });

    session_start();

    $router=new Router;
    $router->run();
    