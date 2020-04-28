<?php

namespace app\models;

use app\core\Model;

class Gallery extends Model{

    public $path = "public/assets/img/";
    public $jpg = ".jpg";
    public $titles = ["Кролик","Лисенок","Еноты","Совенок","Одуванчик","Белка","Птицы",
    "Лиса","Кошка","Енот","Сова","Собака","Панда","Такса","Айсберг"];

    public function getData(){
        // $result = $this->db->row('SELECT * FROM gallery');
        
        for($i = 0; $i < count($this->titles); $i++){
            $result[$i] = [
                "id"=> $i+1,
                'src'=> $this->path.($i+1).$this->jpg,
                "alt"=> $this->titles[$i], 
                "titles"=> $this->titles[$i], 
                "figcaption"=> $this->titles[$i], 
            ];
        }
        // var_dump($result);

        return $result;
    }

}