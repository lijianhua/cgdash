<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;
use Log;

class WechatController extends Controller
{
    protected $app;
    //
    public function __construct()
    {
        $this->app = app('wechat.official_account');
    }

    /**
      *      * 处理微信的请求消息
      *           *
      *                * @return string
      *                     */
    public function serve()
    {
        $this->app->server->push(function($message){
            return "欢迎关注 超广商城！";
        });

        return $this->app->server->serve();
    }

    public function menu()
    {
        $this->app->menu->delete(); 
        $buttons = [
            [
                "type" => "view",
                "name" => "合伙人审核",
                'url' => 'http://www.vbxlub.net/located'
            ],
        ];
        $this->app->menu->create($buttons);
        return  $this->app->menu->current();
    }
}
