<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts(){
        return $this->belongsToMany(post::class,'post_tags');
    }
}
