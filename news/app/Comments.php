<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    protected $fillable = ['comment','news_id','is_active','user_id'];


    public function news()
    {
        return $this->belongsTo (News::class);
    }

    public function users()
    {
        return $this->belongsTo (Users::class,'user_id');
    }

}
