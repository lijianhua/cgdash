<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Group extends Authenticatable
{
    use Notifiable;
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'cg_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_name', 'group_ad_count', 'group_led_count', 'divident',
    ];


    public static function getGroup()
    {
        return self::all();
    }

    public function groupRelation()
    {
        return $this->hasMany(Relations::class);
    }

}
