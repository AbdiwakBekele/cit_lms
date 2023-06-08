<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

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

        $this->validate($request, [
            'fullname'=>'required',
            'email'=>'required',
            'age'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $age = $request->age;
        $phone = $request->phone;
        $address = $request->address;

        $student = Student::find($id);
        $student->fullname = $fullname;
        $student->email = $email;
        $student->age = $age;
        $student->phone = $phone;
        $student->address = $address;
        $student->save();

        if(!empty($student->id)){
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