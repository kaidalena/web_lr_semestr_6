<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    
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
