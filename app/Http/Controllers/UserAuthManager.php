<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAuthManager extends Controller{
    
    // Login Page
    function login(){
        if(Auth::check()){
            return redirect()->intended();
        }
        return view('user_login');
    }

    // Login Request
    function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credential = $request->only('email', 'password');
        if(Auth::attempt($credential)){
            Session::put('user_session_key', true);
            return redirect()->intended();
            // return redirect()->intended('/');
        }else{
            return redirect('/user_login')->with('error', 'Login details are not valid');
        }
    }

    //Register Page
    function register(){
        return view('user_register');
    }

    //Register Requset
    function registrationPost(Request $request){
        $request->validate([
            'fullname'=>'required',
            'age'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'age'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required'
        ]);

        $data['fullname'] = $request->fullname;
        $data['age'] = $request->age;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect('/user_register')->with('error', 'Failed to register');
        }
        return redirect('/user_register')->with('success', 'Registration Successful, login to access the app');
    }

    //Logout User
    function logout(){
        Session::forget('user_session_key');
        Auth::logout();
        return redirect('/user_login');
    }

}