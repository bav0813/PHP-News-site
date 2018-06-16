<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    protected $fillable = [
        'is_active',
    ];

    public function comments()
    {
        return $this->hasMany (Comments::class);
    }
}
