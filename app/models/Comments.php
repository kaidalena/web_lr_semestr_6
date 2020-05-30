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

}