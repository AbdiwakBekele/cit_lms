<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $students = Student::all();
        return view('admin.student_managment.adminStudent', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.student_managment.adminAddStudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $data = $request->validate([
            'fullname'=>'required',
            'email'=>'required|unique:students',
            'age'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'subcity'=>'required',
            'house_no'=>'required',
            'facebook'=>'nullable',
            'instagram'=>'nullable',
            'linkedin'=>'nullable',
            'tiktok'=>'nullable',
            'twitter'=>'nullable',
            'level_of_education'=>'required',
            'work_status'=>'required',
            'current_occupation'=>'required',
            'work_experience'=>'required',
            'password'=>'required'
        ]);

        $data['password'] =  Hash::make($request->password);

        $student = Student::create($data);

        Mail::to($student->email)->send(new StudentRegistered($student));

        if($student){
            return back()
             ->with('success','You have successfully create a new student.');
        }else{
            return back()
            ->with('error','Error creating a new student');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $student = Student::find($id);
        $courses = Course::all();
        return view('admin.student_managment.adminViewStudent', compact('student', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        
        $student = Student::find($id);
        return view('admin.student_managment.adminEditStudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){

        $data = $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'subcity'=>'required',
            'house_no'=>'required',
            'facebook'=>'nullable',
            'instagram'=>'nullable',
            'linkedin'=>'nullable',
            'tiktok'=>'nullable',
            'twitter'=>'nullable',
            'level_of_education'=>'required',
            'work_status'=>'required',
            'current_occupation'=>'required',
            'work_experience'=>'required'
        ]);


        $student = Student::find($id);
        $student->fullname = $data['fullname'];
        $student->email = $data['email'];
        $student->age = $data['age'];
        $student->gender = $data['gender'];
        $student->phone = $data['phone'];
        $student->city = $data['city'];
        $student->subcity = $data['subcity'];
        $student->house_no = $data['house_no'];
        $student->facebook = $data['facebook'];
        $student->instagram = $data['instagram'];
        $student->linkedin = $data['linkedin'];
        $student->tiktok = $data['tiktok'];
        $student->twitter = $data['twitter'];
        $student->level_of_education = $data['level_of_education'];
        $student->work_status = $data['work_status'];
        $student->current_occupation = $data['current_occupation'];
        $student->work_experience = $data['work_experience'];


        if($student->save()){
            return back()
             ->with('success','You have successfully updated student information.');
        }else{
            return back()
            ->with('error','Error updating student information');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $student = Student::find($id)->delete();

        if($student){
            return back()
             ->with('success','You have successfully deleted a student information.');
        }else{
            return back()
            ->with('error','Error deleting student information');
        }
    }
}