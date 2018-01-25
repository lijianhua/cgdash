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
        $auditArr = [0 => '抱歉，正在审核中或审核失败，请联系超广客服了解详情', 1 => '审核已通过  恭喜您正式成为超广合伙人'];
        $info = User::where('openid', '=', $user->id)->first();
        if ($info && $info['userName']) {
            $info = $info->toArray();
            $audit = $auditArr[$info['audit']];
            return view('welcome', ['message' => $audit]);
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
        return view("welcome", ['message' => '管理员审核中 请耐心等待']);
    }

}
