<?php

namespace app\models;

use app\core\Model;


class MyInterests extends Model{

    public $path;

    function __construct($action){
        parent::__construct($action);
        // echo "<p>Me Model __construct(action)</p>";
    }

    public function interests(){

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
