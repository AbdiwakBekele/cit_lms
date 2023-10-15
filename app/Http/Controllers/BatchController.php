<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Progress;
use App\Models\Answer;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentEnroll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class BatchController extends Controller{

    public function index(){
        $batches = Batch::orderBy('created_at', 'desc')->get();
        return view('admin.batch.adminBatchManagment', compact('batches'));
    }

    public function create(){
        $courses = Course::all();
        return view('admin.batch.adminAddBatch', compact('courses'));
    }

    public function store(Request $request){
        $this->validate( $request, [
            'course_id'=>'required',
            'batch_name'=>'required|unique:batches',
            'batch_shift'=>'required',
            'starting_date'=>'required',
            'ending_date'=>'required',
            'description'=>'required'
        ]);

        $course_id =  $request->course_id;
        $batch_name = $request->batch_name;
        $batch_shift =  $request->batch_shift;
        $starting_date =  $request->starting_date;
        $ending_date = $request->ending_date;
        $description = $request->description;

        $batch = new Batch([
            'course_id'=> $course_id, 
            'batch_name'=>$batch_name,
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

    public function show(string $id){
        $students = Student::all();
        $batch = Batch::find($id);
        return view('admin.batch.adminViewBatch', compact('batch', 'students'));
    }

    public function batchStudentProgress(string $classroom_id){
        $classroom = Classroom::find($classroom_id);
        $progresses_passed = Progress::where('classroom_id', $classroom_id)->where('is_passed', 1)->get();
        return view('admin.batch.batchStudentProgress', compact('classroom', 'progresses_passed'));
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

        $data = $request->validate([
            'course_id'=>'required',
            'student_id'=>'required',
            'batch_id'=>'required',
            'working_in_the_field'=>'required',
            'why_interested'=>'required',
            'how_did_you_hear'=>'required',
            'type_of_training'=>'required',
            'additional_info'=>'required',
            'payment_mode'=>'required',
            'payment_type'=>'required'
        ]);

        $data['is_approved'] = 1;
        
        $this->validate( $request, [
                'student_id'=> Rule::unique('classrooms')->where('course_id', $request->course_id)
        ]);

        $classroom = Classroom::create($data);

        if($classroom){
            $student = Student::find($data['student_id']);
            $course = Course::find($data['course_id']);
            $batch = Batch::find($data['batch_id']);
            Mail::to($student->email)->send(new StudentEnroll($student->fullname, $course->course_name, $batch->shift));
            
            // Model has been successfully inserted
            return back()
             ->with('success','You have successfully Registered for this batch');
        }else{
            return back()
            ->with('error','Error registering for this batch');
        }

    }

    public function getBatches(Request $request){
        $batches = Course::findOrFail($request->input('course_id'))->batches;
        return response()->json($batches);
    }

    public function unenrollStudent(string $classroom_id, Request $request){
        $this->validate($request, [
            'password'=>'required'
        ]);

        $user = Auth::user();

        if(Hash::check($request->password, $user->password)){
            $classroom = Classroom::find($classroom_id)->delete();
            if($classroom){
                return back()
                ->with('success','Student Successfully unenrolled from this batch');

            }else{
                return back()
                ->with('error','Error unenrolling student');
            }
        }else{
            return back()
                ->with('error','Incorrect Password');
        }

        

    }

    public function edit(string $id){
        $batch = Batch::find($id);
        $courses = Course::all();
        return view('admin.batch.adminEditBatch', compact('batch', 'courses'));
    }

    public function update(Request $request, string $id){
        $this->validate( $request, [
            'course_id'=>'required',
            'batch_name'=>'required',
            'batch_shift'=>'required',
            'starting_date'=>'required',
            'ending_date'=>'required',
            'description'=>'required'
        ]);

        $batch = Batch::find($id);

        $batch->course_id = $request->course_id;
        $batch->batch_name = $request->batch_name;
        $batch->shift = $request->batch_shift;
        $batch->starting_date = $request->starting_date;
        $batch->ending_date = $request->ending_date;
        $batch->description = $request->description;

        if($batch->save()){
            return back()
             ->with('success','You have successfully updated a batch informatoin.');
        }else{
            return back()
            ->with('error','Error updating batch information');
        }


    }

    public function destroy(string $id, Request $request){
        $this->validate($request, [
            'password'=>'required'
        ]);
        $user = Auth::user();
        if(Hash::check($request->password, $user->password)){
            $batch = Batch::find($id)->delete();

            if($batch){
                return back()
                ->with('success','You have successfully deleted a batch informatoin.');
            }else{
                return back()
                ->with('error','Error deleting batch information');
            }
        }else{
            return back()
                ->with('error','Incorrect Password');
        }
    }

    public function reviewQuiz(string $classroom_id, string $content_id){

        $classroom = Classroom::find($classroom_id);
        
        $answers = Answer::whereHas('quiz', function ($query) use ($classroom_id, $content_id) {
                    $query->where('classroom_id', $classroom_id)
                        ->where('content_id', $content_id);
                    })->get();

        return view('admin.batch.reviewQuiz', compact('answers', 'classroom', 'content_id'));

    }
    public function submitQuizResult(Request $request, $classroom_id, $content_id){
        $this->validate($request, [
            'points.*'=>'required',
            'points'=>'required|array'
        ]);

        $total_score = 0;

        foreach($request->points as $points){
            $total_score += $points;
        }
        $progress = Progress::where('classroom_id', $classroom_id)->where('content_id', $content_id)->first();
        $progress->score= $total_score;

        if($progress->save()){
            return redirect('/batch_student_progress/'. $classroom_id)->with('success','You have successfully submitted a quiz score');
        }else{
            return redirect()->back()->with('error','Error Submitting Student Score Record');
        }
        
    }
}