<?php

namespace app\models;

use app\core\Model;
use app\models\DiaryRecord;


class Diary extends Model{

    public function __construct($action){
         // echo "<p>Guest Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function blog(){
        $diaryDB = new DiaryRecord();
        // $diaryDB->linksPages();
        return $diaryDB->linksPages();
    }


}
