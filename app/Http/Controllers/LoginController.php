<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login/index');
    }

    public function login(){

        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required',
            'is_remember'=>'integer'
        ]);

        $user = request(['email','password']);
        $is_remember= boolValue(request('is_remember'));
        if (\Auth::attempt($user,$is_remember)){
            return redirect('posts');
        }

        return \Redirect::back()->withErrors('账号或密码错误');


    }

    public function logout(){
        \Auth::logout();
        return redirect('login');
    }
}
