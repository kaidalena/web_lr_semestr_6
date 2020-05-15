<?php

namespace app\models;

use app\core\Model;
use app\models\RecordsRecord;
use app\models\validators\ValidBlog;

class Records extends Model{

    public $validator;

    public function __construct($action){
        //  echo "<p>Comments Model __construct(action)</p>";
        parent::__construct($action);
    }

    public function upload(){
        $this->validator = new ValidBlog();
    }

    public function save($pathFile){
        $recordsBD = new RecordsRecord();
        $result = []; 

        $file = fopen($pathFile, "r");
        $i = 0;
            // $handle = fopen("test.csv", "r");
            while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                // $row = [null];
                // $num = count($data);
                // echo "<p> $num полей в строке $row: <br /></p>\n";
                // for ($c=0; $c < $num; $c++) {
                //     $row[$c + 1] = $data[$c];
                // }

                $row = [
                    'id' => null,
                    'topic' => $data[0],
                    'message' => $data[1],
                    'img name' => $data[2],
                    'img src' => $data[3],
                    'date' => $data[4]
                ];
                $this->validator->Validate($row);

                // echo "<br/>".$row['topic']."   ";
                // var_dump($this->validator->getErrors());
                if ($this->validator->checkErrors()) $result[$i++] = array_values($row);
            }
            fclose($file);

            if (empty($result)) return "Данные не были сохранены";

            $recordsBD->save($result);
            return "Данные сохранены";
    }

}
