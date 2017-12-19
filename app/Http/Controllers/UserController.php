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

}
