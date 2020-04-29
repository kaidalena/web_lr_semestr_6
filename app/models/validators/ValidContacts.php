<?php

namespace app\models\validators;

use app\models\validators\Validator;

class ValidContacts extends Validator { 
                
    public function check_email($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^([A-z0-9_\.-]+)@([A-z0-9_\.-]+)\.([A-z\.]{2,6})$/', $p1)) return null;
        return $this->errors['email'];
    }

    public function check_data($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^(0|1)[0-2]{1}[\/]{1}[0-3]{1}[0-9]{1}[\/]{1}[0-9]{4}+$/', $p1)) return null;
        return $this->errors['notValidData'];
    }

    public function check_phone($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^[+]{1}[37]{1}[0-9]{10}+$/', $p1)) return null;
        else return $this->errors['phone'];
    }

    public function check_message($p1) {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        return null;
    }

    public function check_age($p1) {
        if (preg_match('/^[1-3]{1,1}+$/', $p1)) return null;
        return $this->errors['age']; 
    } 
}