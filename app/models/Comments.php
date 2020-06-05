<?php

namespace app\models;

use app\core\BaseActiveRecordModel;

class Comments extends BaseActiveRecordModel{

    protected static  $tablename = "comments";
    protected static $dbfields = [];
    public static  $pdo;

    public static function getComments($id_blog){
        var_dump((static::find('id_blog', $id_blog)));
    }

    public function selectAll(){
        $query = "SELECT * FROM ".static::$tablename." ORDER BY `".static::$tablename."`.`id_blog`, `".static::$tablename."`.`date` DESC LIMIT $start, $per_page";
        $rows = static::$pdo->query($query);
        $rows = $rows->fetchAll(static::$pdo::FETCH_ASSOC);
        return $rows;
    }

}