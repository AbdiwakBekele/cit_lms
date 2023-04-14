<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAuthManager extends Controller{
    
    function login(){

        if(Auth::check()){
            return view('user_page');
        }
        return view('user_login');

    }


    function loginPost(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credential = $request->only('email', 'password');
        if(Auth::attempt($credential)){
            return view('user_page');
            // return redirect()->intended('/');
        }else{
            return redirect('/user_login')->with('error', 'Login details are not valid');
        }
    }

}