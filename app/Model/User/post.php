<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function tags(){
        return $this->belongsToMany(tag::class,'post_tags');
    }
    public function categories(){
        return $this->belongsToMany(category::class,'category_posts');
    }
}
