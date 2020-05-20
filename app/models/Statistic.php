<?php

namespace app\models;

use app\core\BaseActiveRecordModel;
use PDO;
use PDOException;

class Statistic extends BaseActiveRecordModel{
    public static $tablename = 'statistics';
    public static $fields = [];
    public static $pdo;

    public $date;
    public $web_page;
    public $ip_address;
    public $host_name;
    public $browser_name;

    public function save_statistic($page){
        echo "<p style='margin-left: 50px;'> save_statistic </p>";
        $this->date = date('Y-m-d h:m:s');
        $this->web_page = $page;
        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->browser_name = $_SERVER['HTTP_USER_AGENT'];
        $this->save([[null, $this->date, $this->web_page, $this->ip_address,
                        $this->host_name, $this->browser_name]]);
    }

    function visitings(){
        $args = $this->linksPages();
        $args['data'] = parent::findAll();
        return $args;
    }

    public function linksPages(){
        $per_page=5;
        $page= (int)(isset($_GET['page']) ? ($_GET['page']-1) : 0);
        $start=abs($page*$per_page);
        $query = "SELECT * FROM ".static::$tablename." ORDER BY `".static::$tablename."`.`date` DESC LIMIT $start, $per_page";

        $rows = static::$pdo->query($query);

        $pages = [];
        $query = "SELECT count(*) FROM ".static::$tablename;
        $total_rows = static::$pdo->query($query)->fetchColumn();
        $num_pages = ceil($total_rows/$per_page);
        for($i=1;$i <= $num_pages; $i++) {
           if ($i-1 == $page) {
                $pages[$i] = "$i ";
           } else {
                $pages[$i] = "<a href='blog?page=".$i."'>".$i."</a> ";
           }
        }

        return [
           'rows' => $rows,
           'pages' => $pages
        ];
    }

}