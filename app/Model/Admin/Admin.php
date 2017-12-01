<?php

namespace App\Model\Admin;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function roles(){
        return $this->belongsToMany('App\Model\Admin\Role');
    }

    protected $fillable = [
        'name', 'email', 'password','status','phone'
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
