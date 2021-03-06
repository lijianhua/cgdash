<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'openid', 
        'userName' , 'telPhone', 'address', 'bankName', 
        'bankAccount', 'referrer', 'audit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userRelation()
    {
        return $this->hasMany(Relations::class);
    }

    public static function getUser()
    {
        return self::all();
    }
}
