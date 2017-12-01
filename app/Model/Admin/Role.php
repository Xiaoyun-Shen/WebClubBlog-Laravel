<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions(){
        return $this->belongsToMany('App\Model\Admin\Permission','permission_role');
    }
}
