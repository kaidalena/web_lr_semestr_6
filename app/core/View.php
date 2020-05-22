<?php

namespace app\core;

class View{

    public $route;
    public $path;
    public $layout = 'default';


    public function __construct($route){
        // echo '<p>View -> construct</p>';
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];

    }

    public function render($title, $vars=[]){
        extract($vars);
        // extract — Импортирует переменные из массива в текущую таблицу символов.
        // Эта функция рассматривает ключи массива в качестве имен переменных, а их значения - в качестве значений этих переменных.
        // Для каждой пары ключ/значение будет создана переменная в текущей таблице символов
        $admin_path ="";
        // if (array_key_exists('admin_area', $_REQUEST)){
        //     $admin_path = "admin/";
        // }
        $view = "app/${admin_path}views/".$this->path.'.php';
        // echo "<p style='margin-left: 50px;'> view: $view </p>";
        echo "view::render():  path = ".$view;
        if (file_exists($view)){
            // ob_start();     //включение буффера
            //require аналогично include, за исключением того, что при ошибке он также выдаст фатальную ошибку уровня E_COMPILE_ERROR.
            // require $view;      //считывание основного кода страницы(body) в буффер
            // $content = ob_get_clean();      //заносим все из буффера в переменную content
            require "app/${admin_path}views/layouts/".$this->layout.'.php';      //подключение шаблона default
        }else{
            echo 'View not found: '.$this->path;
        }

    }

    public static function errorCode($code){
        http_response_code($code);      //http_response_code — Получает или устанавливает код ответа HTTP
        require 'app/views/errors/'.$code.'.php';
        exit;
    }

    public function redirect($url){
        header('location: '.$url);
        exit;
    }

    public function message($status, $message) {
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

    public function location($url) {
		exit(json_encode(['url' => $url]));
	}
}