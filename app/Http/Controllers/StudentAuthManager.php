<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegistered;

class StudentAuthManager extends Controller{
    
    function login(){

        if(Auth::guard('student')->check()){
            return redirect()->intended();
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
            Session::put('student_session_key', true);
            return redirect()->intended();
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
            'email'=> 'required|email|unique:students',
            'age'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'password'=>'required'
        ]);

        $data['fullname'] = $request->fullname;
        $data['email'] = $request->email;
        $data['age'] = $request->age;
        $data['phone'] = $request->phone;
        $data['gender'] = $request->gender;
        $data['address'] = $request->address;
        $data['password'] = Hash::make($request->password);

        $user = Student::create($data);

        Mail::to($user->email)->send(new StudentRegistered($user));

        

        if(!$user){
            return redirect('/student_register')->with('error', 'Failed to register');
        }
        return redirect('/student_register')->with('success', 'Registration Successful, login to access the app <br> Please check your email to verify your account');
    }

    function logout(){
        Session::forget('student_session_key');
        Auth::guard('student')->logout();
        return redirect('/student_login');
    }
}