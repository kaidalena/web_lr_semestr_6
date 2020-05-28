<?php

namespace app\core;

use PDO;
use PDOException;

// abstract class BaseActiveRecord extends Model{
abstract class BaseActiveRecordModel extends Model {

    public static $pdo;
    protected static $tablename;
    protected static $dbfields = array();

    public function __construct($action) {
        //  echo "<p>BaseActiveRecord __construct(action)</p>";
        parent::__construct($action);
        if (!static::$tablename){
            echo " if (!static::\$tablename)";
            return ;
        }

        static::setupConnection();
        static::getFields();

        // echo "<script> console.log('BaseActiveRecord constructor');
        //                 console.log('table name: ".static::$tablename."'); </script>";
    }

    public static function getFields() {
        $stmt = static::$pdo->query("SHOW FIELDS FROM ".static::$tablename);
        // while ($row = $stmt->fetch()) {
        for ($i=0;$row = $stmt->fetch(); $i++ ){
            // echo "<p>".var_dump($row)."</p>";
            static::$dbfields[$i] = $row['Field'];
        }
    }

    public static function getTableName(){
        return static::$tablename;
    }

    public static function setupConnection() {
        if (!isset(static::$pdo)) {
        $eror = false;
        try {
            $config = require 'app/config/db.php';
            static::$pdo = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
        } catch (PDOException $ex) {
            die("Ошибка подключения к БД: $ex");
            echo "Ошибка подключения к БД: $ex";
        }
        }
    }

    public static function find($field, $value){
        $sql = "SELECT * FROM ".static::$tablename." WHERE $field=$value";
        $stmt = static::$pdo->query($sql);
        if ($stmt == false) return null;

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $row ;
    }

    public static function findAll($fields = null) {
        if ($fields == null){
            $sql = "SELECT * FROM ".static::$tablename;
            $stmt = static::$pdo->query($sql);

            $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // echo "<p>".var_dump($stmt)." </p>";

            return $stmt;
        }
    }



    public function save($values) {
        // echo "<p>".var_dump($values)."</p>";
        //Запрос должен выглядить так:
        //INSERT INTO nameTable (field1, field2, field3) VALUES (?,?,?);

        $fields = "";
        $val = "";

        foreach(static::$dbfields as $temp){
            $fields .= "`".$temp."`,";
            $val = $val.'?,';
        }

        $fields = rtrim($fields, ",");
        $val = rtrim($val, ",");

        $query = "INSERT INTO ".static::$tablename."($fields) VALUES ($val)";

        // echo "<script> console.log('query:' + '$query'); </script>";

        $stmt = static::$pdo->prepare($query);
        try {
            static::$pdo->beginTransaction();
            foreach ($values as $row){
                $stmt->execute($row);
            }
            static::$pdo->commit();
        }catch (PDOException $e){
            static::$pdo->rollback();
            throw $e;
        }
    }


    public function update( $params){
        //"UPDATE users SET name=:name, surname=:surname, sex=:sex WHERE id=:id";
        //"UPDATE users SET name='lena', surname='kaida', sex='w' WHERE id=:id";
        $strVars = '';

        foreach(static::$dbfields as $field){
            $strVars .= $field."=:".$field.",";
        }

        $strVars = rtrim($strVars, ",");

        $query = "UPDATE ".static::$tablename." SET ".$strVars." WHERE `id` = :id";
        $stmt = static::$pdo->prepare($query);
        $stmt->execute($params);
    }

    public function delete(){
        $sql = "DELETE FROM ".static::$tablename." WHERE ID=".$this->id;
        $stmt = static::$pdo->query($sql);
        if($stmt){
        return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
        print_r(static::$pdo->errorInfo());
        }
    }
}
