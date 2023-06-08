<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Validation\Rule;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $batches = Batch::all();
        return view('admin.batch.adminBatchManagment', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $courses = Course::all();
        return view('admin.batch.adminAddBatch', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate( $request, [
            'course_id'=>'required',
            'batch_shift'=>'required',
            'starting_date'=>'required',
            'ending_date'=>'required',
            'description'=>'required'
        ]);

        $course_id =  $request->course_id;
        $batch_shift =  $request->batch_shift;
        $starting_date =  $request->starting_date;
        $ending_date = $request->ending_date;
        $description = $request->description;

        $batch = new Batch([
            'course_id'=> $course_id, 
            'shift'=>$batch_shift, 
            'starting_date'=>$starting_date,
            'ending_date'=>$ending_date,
            'description'=>$description,
            'status'=>'active'
        ]);

        $batch->save();

        if (!empty($batch->id)) {
            // Model has been successfully inserted
            return back()
             ->with('success','You have successfully created a new batch.');
        }else{
            return back()
            ->with('error','Error Creating a New batch');
        }
    }

    /**
     * Display the specified resource.
     */
    
    public function show(string $id){
        $students = Student::all();
        $batch = Batch::find($id);
        return view('admin.batch.adminViewBatch', compact('batch', 'students'));
    }

    public function approveStudent(string $id){

        $classroom = Classroom::find($id);
        $classroom->is_approved = 1;
        $classroom->save();


        if(!empty($classroom->id)){
            return back();
        }else{
            return back()
            ->with('error','Error updating course information');
        }
        
    }

    public function disapproveStudent(string $id){
        $classroom = Classroom::find($id);
        $classroom->is_approved = 0;
        $classroom->save();


        if(!empty($classroom->id)){
            return back();
        }else{
            return back()
            ->with('error','Error updating course information');
        }
    }

    public function addStudentBatch(Request $request){

            $course_id =  $request->course_id;
            $student_id =  $request->student_id;
            $batch_id =  $request->batch_id;

           $this->validate( $request, [
            'student_id'=> Rule::unique('classrooms')->where('course_id', $course_id  )
        ]);

        $classroom = new Classroom([
            'course_id'=> $course_id,
            'student_id'=> $student_id, 
            'batch_id'=>$batch_id,
            'is_approved'=>1
        ]);

        if($classroom->save()){
            // Model has been successfully inserted
            return back()
             ->with('success','You have successfully Registered for this batch');
        }else{
            return back()
            ->with('error','Error registering for this batch');
        }

    }

    public function getBatches(Request $request)
    {
        $batches = Course::findOrFail($request->input('course_id'))->batches;
        return response()->json($batches);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
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
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}