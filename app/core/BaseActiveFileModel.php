<?php

namespace app\core;

use PDO;
use PDOException;

abstract class BaseActiveRecord extends Model{

    public function __construct($action) {
         parent::__construct($action);
        echo "<script> console.log('BaseActiveFile constructor'); </script>";
    }

}
