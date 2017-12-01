<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function comments(){
        return $this->hasMany('App\Model\User\Comment','post_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Model\user\Tag','post_tag')->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany('App\Model\user\Category','category_post')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
