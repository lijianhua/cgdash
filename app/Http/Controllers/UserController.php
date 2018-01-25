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
        $info = ['name' => $user->nickname, 'openid' => $user->id, 'email' => '', 'password' => '123456'];
        $result = User::updateOrCreate(['openid' => $user->id], $info);
        return '欢迎'.$user->nickname.'进入超广商城';
    }

    public function located(Request $request)
    {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料
        $auditArr = [0=> '审核中', 1 => '审核通过'];
        $info = User::where('openid', '=', $user->id)->first();
        if ($info && $info['userName']) {
            $info = $info->toArray();
            $audit = $auditArr[$info['audit']];
            return view('welcome', ['message' =>'您的信息目前'.$audit]);
        }
        return view('located');
    }

    public function joined(Request $request)
    {
        $messages = [
            'userName.required' => '请添加姓名',
            'telPhone.required' => '请填写手机号',
            'telPhone.max' => '请填写正确的手机号',
            'telPhone.min' => '请填写正确的手机号',
            'address.required' => '请填写地址',
            'bankName.required' => '请填写开户行',
            'bankAccount.required' => '请填写银行账号',
        ];
        $data = $this->validate($request, [
            'userName' => 'required',
            'telPhone' => 'required|max:11|min:11',
            'address' => 'required',
            'bankName' => 'required',
            'bankAccount' => 'required',
            'referrer' => ''
        ], $messages);
        $user = session('wechat.oauth_user'); // 拿到授权用户资料
        $info = ['name' => $user->nickname, 'openid' => (string)$user->id, 'email' => '', 'password' => '123456', 'audit' => 0];
        $data = array_merge($data, $info);
        $result = User::updateOrCreate(['openid' => $user->id], $data);
        return view("welcome", ['message' => '欢迎加入,请等待审核']);
    }

}
