<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\User;
use Illuminate\Http\Request;


class BlogController extends Controller{
    
    public function blog(){
        $blogModel = new Blog();
        $data = [
            'blogs' => $blogModel->selectAll(),
            'controller' => $this
        ];
        return view('blog')->with($data);
    }

    public function updateRecord(){
        header('Content-Type: application/json');
        $newData = (array) json_decode(file_get_contents('php://input'));
        $result = Blog::where('id', $newData["id"])->update($newData);
        // $result = $this->model->save($newData);
        $jsonRespons = "{ \"status\": ";
        if ($result) $jsonRespons .= "1 }";
        else $jsonRespons .= "0 }"; 
        echo $jsonRespons;
        //ответить json
    }
    
}
