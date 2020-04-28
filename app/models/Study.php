<?php

namespace app\models;

use app\core\Model;

class Study extends Model{

    public function test(){
        $result = $this->db->row('SELECT text, description FROM test');
        // var_dump($result);
        return $result;
    }

}