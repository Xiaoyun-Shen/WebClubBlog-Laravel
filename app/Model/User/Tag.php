<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts(){
        return $this->belongsToMany('App\Model\user\Post','post_tag')->orderBy('created_at','DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
