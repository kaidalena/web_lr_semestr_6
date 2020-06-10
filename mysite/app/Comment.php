<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function oneUser(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
