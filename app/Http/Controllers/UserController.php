<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function getUser(Request $request)
    {
        $openId = $request->get('openId');
        $user = User::findOrFail(1);
        return $user;
    }

    public function shop(Request $request)
    {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料
        return '欢迎'.$user->nickname.'进入超广商城';
    }

}
