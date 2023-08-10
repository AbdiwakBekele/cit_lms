<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\StudentRegistered;
use App\Mail\StudentEnroll;
use Illuminate\Support\Facades\Mail;

class StudentRegistrationController extends Controller
{
    // View Registration
    public function index(){
        return view('admin.registration.adminViewRegistration');
    }

    public function create(){
        $courses = Course::all();
        return view('admin.registration.adminAddRegistration', compact('courses'));
    }

    public function store(Request $request){

        $data_student = $request->validate([
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
            'work_experience'=>'required'
        ]);

        $password = Str::random(8); // Generate a random password with 8 character
        $data_student['password'] =  Hash::make($password);
        $student = Student::create($data_student);

        Mail::to($student->email)->send(new StudentRegistered($student, $password));

        if($student){
            $data_class = $request->validate([
                'course_id'=>'required',
                'batch_id'=>'required',
                'working_in_the_field'=>'required',
                'why_interested'=>'required',
                'how_did_you_hear'=>'required',
                'type_of_training'=>'required',
                'additional_info'=>'required',
                'payment_mode'=>'required',
                'payment_type'=>'required'
            ]);

                $data_class['student_id'] = $student->id;
                $data_class['is_approved'] = 1;

                $classroom = Classroom::create($data_class);
                    
                if($classroom){
                    $course = Course::find($data_class['course_id']);
                    $batch = Batch::find($data_class['batch_id']);
                    Mail::to($student->email)->send(new StudentEnroll($student->fullname, $course->name, $batch->shift));
            
                    return back()
                            ->with('success','Successfully Registered a student');
                }else{
                    return back()
                            ->with('error','Error Registering a Student');
                }
            }
            
        }

    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        //
    }
}