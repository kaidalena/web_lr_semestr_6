<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidBlog;
use app\core\BaseActiveRecordModel;

class Blog extends BaseActiveRecordModel{

    protected static  $tablename = "blog";
    protected static $dbfields = [];
    public static  $pdo;

    public function __construct($action){
        //  echo "<p>Blog Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function send(){
        $this->validator = new ValidBlog();

        return [
           'valid' => $this->validator,
           'rules' => $this->validator->getRules(),
           'errors' => $this->validator->getErrors(),
           'values'=> $this->validator->getErrors()
       ];
    }

    public function upload(){
        $this->validator = new ValidBlog();
    }

    public function blog(){
        return $this->linksPages();
    }

    

//сохранение в бд
public function importFromFile($pathFile){
    $result = [];

    $file = fopen($pathFile, "r");
    $i = 0;
       // $handle = fopen("test.csv", "r");
     while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            $row = [
                'id' => null,
                'topic' => $data[0],
                'message' => $data[1],
                'img name' => $data[2],
                'img src' => $data[3],
                'date' => $data[4]
            ];
            $this->validator->Validate($row);

            // echo "<br/>".$row['topic']."   ";
            // var_dump($this->validator->getErrors());
            if ($this->validator->checkErrors()) $result[$i++] = array_values($row);
       }
       fclose($file);

       if (empty($result)) return "Данные не были сохранены";

       // echo "<br/>   ";
       // var_dump($result);
       static::save($result);
       return "Данные сохранены";
}

    public function insert($val_arr){
        $val = [
           array_values($val_arr)
        ];
        // echo "<p>".var_dump($val)."</p>";
        parent::save( $val);
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
        $rows = $rows->fetchAll(static::$pdo::FETCH_ASSOC);

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
