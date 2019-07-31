<?php

namespace App\Model\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany(tag::class,'post_tags')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany(category::class,'category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getSlugAttribute($value)
    {
        return route('user.post',$value);
    }
}
