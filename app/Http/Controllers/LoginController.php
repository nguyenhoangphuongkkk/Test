<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request) {
        if ($request->isMethod('POST')) {
            //đăng nhập thành công
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('st');
            } else {
                Session::flash('error','Sai mật khẩu hoặc email');
                return redirect()->route('login');
            }
        }
        return view('auth.login');
    }
}
