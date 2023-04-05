<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentAuthManager extends Controller{
    
    function login(){

        if(Auth::guard('student')->check()){
            return redirect('/');
        }
        return view('user_student.student_login');

    }

    function loginPost(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credential = $request->only('email', 'password');
        if(Auth::guard('student')->attempt($credential)){
            return redirect()->intended('/');
        }else{
            return redirect('/student_login')->with('error', 'Login details are not valid');
        }
    }

    function register(){
        return view('user_student.student_signup');
    }

    function registrationPost(Request $request){
        $request->validate([
            'fullname'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required'
        ]);

        $data['fullname'] = $request->fullname;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = Student::create($data);

        if(!$user){
            return redirect('/student_register')->with('error', 'Failed to register');
        }
        return redirect('/student_register')->with('success', 'Registration Successful, login to access the app');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/student_login');
    }
}