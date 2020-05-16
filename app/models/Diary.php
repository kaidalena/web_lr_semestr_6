<?php

namespace app\models;

use app\core\BaseActiveRecordModel;
use app\models\DiaryRecord;


class Diary extends BaseActiveRecordModel{

    protected static  $tablename = "blog";
    protected static $dbfields = [];
    public static  $pdo;

    public function __construct($action){
         // echo "<p>Guest Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function blog(){
    
        // $diaryDB->linksPages();
        return $this->linksPages();
    }

    public function linksPages(){

        // echo "<br/> get: ";
        // var_dump($_GET);
        // echo "<br/>";

        // количество записей, выводимых на странице
        $per_page=5;

        // получаем номер страницы
        $page= (int)(isset($_GET['page']) ? ($_GET['page']-1) : 0);
        
        // вычисляем первый операнд для LIMIT
        $start=abs($page*$per_page);
        // выполняем запрос и выводим записи
        $query = "SELECT * FROM ".static::$tablename." ORDER BY `".static::$tablename."`.`date` DESC LIMIT $start, $per_page";

        $rows = static::$pdo->query($query);

        // foreach (static::$pdo->query($query) as $i => $str) {
        //     echo ($i+$start).". ".var_dump($str)."<br>\n";
        // }
            
        $pages = [];
        // выводим ссылки на страницы:
        $query = "SELECT count(*) FROM ".static::$tablename;
        $total_rows = static::$pdo->query($query)->fetchColumn();
        // Определяем общее количество страниц
        $num_pages = ceil($total_rows/$per_page);
        for($i=1;$i <= $num_pages; $i++) {
            // текущую страницу выводим без ссылки
            if ($i-1 == $page) {
                $pages[$i] = "$i ";
                // echo $i." ";
            } else {
                $pages[$i] = "<a href='blog?page=".$i."'>".$i."</a> ";
                // echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i."</a> ";
            }
        }

        return [
            'rows' => $rows, 
            'pages' => $pages
        ];
    }

}
