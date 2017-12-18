<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Adpositionid extends Authenticatable
{
    use Notifiable;
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'adpositionid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'province', 'city', 'area', 'address', 'area_led_count', 'area_ad_count'
    ];

}
