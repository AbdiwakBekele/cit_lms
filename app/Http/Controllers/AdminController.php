<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\CourseCategory;
use App\Models\User;

class AdminController extends Controller
{
    

    public function index(){
        $courses = Course::all();
        $students= Student::all();
        $categories = CourseCategory::all();
        $users = User::all();
        return view('admin.adminDashboard', compact('courses', 'students', 'categories', 'users'));
    }

}