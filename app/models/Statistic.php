<?php

namespace app\models;

use app\core\BaseActiveRecordModel;
use PDO;
use PDOException;

class StatisticModel extends BaseActiveRecordModel{
    protected static $tablename = 'statistics';
    protected static $fields = array();
    protected static $pdo;

    public $time_statistic;
    public $web_page;
    public $ip_address;
    public $host_name;
    public $browser_name;

    function save_statistic($page){
        $this->time_statistic = date('Y-m-d h:m:s');
        $this->web_page = $page;
        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->browser_name = $_SERVER['HTTP_USER_AGENT'];
        $this->save([[$this->time_statistic, $this->web_page, $this->ip_address,
                        $this->host_name, $this->browser_name]]);
    }

    function visitings(){
        return [
            'data' => parent::findAll()
        ];
    }

}