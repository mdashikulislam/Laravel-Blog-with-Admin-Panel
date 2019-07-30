<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    public function post()
    {
        return $this->belongsTo(post::class,'like');
    }
}
