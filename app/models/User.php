<?php

namespace app\models;

use app\core\BaseActiveRecordModel;
use app\models\validators\ValidRegistration;
use app\models\validators\ValidLogin;
use PDO;

class User extends BaseActiveRecordModel{

    protected static  $tablename = "users";
    protected static $dbfields = [];
    public static  $pdo;
    public $fio;

    public function __construct($action){
        //  echo "<p>Blog Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function registration(){
        $this->validator = new ValidRegistration($this);
        return[
            'rules' => $this->validator->getRules(),
            'errors' => $this->validator->getErrors(),
        ];
    }

    public function login(){
        $this->validator = new ValidLogin($this);
        return[
            'rules' => $this->validator->getRules(),
            'errors' => $this->validator->getErrors(),
        ];
    }

    public function exit(){}

    public function check_exisists_login($login){
        $search = $this->find("`login`", "'".$login."'");
        return empty($search);      //true если пусто
    }

    public function check_exisists_login_password($login, $password){
        $sql = "SELECT * FROM ".static::$tablename." WHERE `login`='$login' AND `password`='$password'";
        $stmt = static::$pdo->query($sql);
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($stmt);
        
        if ($stmt == false) return false;
        $this->fio = $stmt['name'];
        return true;
    }
     
    public function saveUser(){
        $val = [
            [null, $_POST['name'], $_POST['email'], $_POST['login'], $_POST['password'] ]
        ];
        $this->save($val);
    }

    public function authUser($post){
        $this->validator->Validate($post);
        if (!$this->validator->checkErrors()) return false;
        return true;
    }
}