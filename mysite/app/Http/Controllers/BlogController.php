<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\User;
use Illuminate\Http\Request;


class BlogController extends Controller{
    
    public function blog(){
        $this->data['controller'] = $this;
        $blogModel = new Blog();
        $data = [
            'blogs' => $blogModel->selectAll(),
            'controller' => $this
        ];
        return view('blog')->with($data);
    }


    
}
