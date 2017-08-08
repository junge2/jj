<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register/index');
    }

    public function register(){

        $this->validate(request(),[
            'name'=>'required|min:3|unique:users,name',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|confirmed'
        ]);
        $name=request('name');
        $email=request('email');
        $password=bcrypt(request('password'));
        $a=User::create(compact('name','email','password'));
//        dd($a);
        return redirect('login');
    }
}
