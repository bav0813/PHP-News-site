<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model


{


    public function comments()
    {
        return $this->hasMany (Comments::class);
    }

    public function categories()
    {
        return $this->hasOne('App\Category','id');
    }


//    public function addComment($comment_body)
//    {
//        $this->comments ()->create (['comment'=>$comment_body]);
//    }
}
