<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ValidContacts;

class Me extends Model{

    public $path;

    function __construct($action)
    {
        $this->path = $action."Model";
    }

    public function loadModel(){
        $method = $this->path;
        return $this->$method(); 
    }

    public function aboutModel(){
        // echo "this is about model";
    }

    public function contactsModel(){
        $this->validator = new ValidContacts();
        // echo "this is contacts model";
    }

    public function interestModel(){
        // echo "this is interest model";
        // $result = $this->db->row('SELECT text, description FROM test');
        // var_dump($result);

        $result = [
            [
                'src' => "book",
                'name' => 'Любимая книга',
                'description' => "Представьте себе ровное, как стол место, вымощенное камнем. Вокруг него высоченные стены. За стенами - Лабиринт.",
            ],

            [
                'src' => "film",
                'name' => 'Любимый фильм',
                'description' => "Преуспевающий бизнесмен получает в наследство шестерых пингвинов и буквально влюбляется в них.",
            ],

            [
                'src' => "sport",
                'name' => 'Любимый вид спорта',
                'description' => "Есть разнообразное количество видов бега, как двигательной активности, которой занимаются профессиональные атлеты и многие люди, заботящиеся о здоровье и физической форме."
            ]

        ];

        return $result;
    }

}