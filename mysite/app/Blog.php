<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{

    protected $fillable = ['topic','message', 'img_name', 'img_src', 'created_at'];
    
    public function selectAll(){
        $blog = $this->all();
        $resultBlogs = [];
        foreach($blog as $key => $temp){

            $comments = $temp->manyComments;
            $resultComments = [];
            foreach($comments as $i => $record){
                $resultComments[$i]['comment'] = $record;
                $resultComments[$i]['user'] = $record->oneUser; 
            }

            $resultBlogs[$key]['blog'] = $temp;
            $resultBlogs[$key]['comments'] = $resultComments;
        }
        return $resultBlogs;
    }

    public function manyComments(){
        return $this->hasMany('App\Comment', 'id_blog', 'id');
    }
}
