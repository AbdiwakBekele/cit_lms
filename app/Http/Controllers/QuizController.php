<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Course;
use App\Models\Section;
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }

    public function createQuiz(string $course_id, string $section_id){

        $course = Course::find($course_id);
        $section = Section::find($section_id);
        
        return view('admin.course.adminAddSectionQuiz', compact('course', 'section'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate( $request, [
            'course_id'=>'required',
            'section_id'=>'required',
            'question'=>'required',
            'answer_1'=>'required',
            'answer_2'=>'required',
            'answer_3'=>'required',
            'answer_4'=>'required',
            'answer'=>'required'
        ]);

        $correct_answer = "";
        if($request->answer == 'answer_1'){
            $correct_answer = $request->answer_1;
        }else if($request->answer == 'answer_2'){
            $correct_answer = $request->answer_2;
        }else if($request->answer == 'answer_3'){
            $correct_answer = $request->answer_3;
        }else if($request->answer == 'answer_4'){
            $correct_answer = $request->answer_4;
        }

        $course_id =  $request->course_id;
        $section_id =  $request->section_id;
        $question =  $request->question;
        $answer_1 = $request->answer_1;
        $answer_2 = $request->answer_2;
        $answer_3 = $request->answer_3;
        $answer_4 = $request->answer_4;

        $quiz = new Quiz([
            'course_id'=> $course_id,
            'section_id'=> $section_id, 
            'question'=>$question, 
            'answer_1'=>$answer_1,
            'answer_2'=>$answer_2,
            'answer_3'=> $answer_3,
            'answer_4'=> $answer_4,
            'answer'=> $correct_answer
        ]);

        $quiz->save();

        if (!empty($quiz->id)) {
            
            // Model has been successfully inserted
            return back()
             ->with('success','You have successfully created a new quiz question.');
        }else{
            return back()
            ->with('error','Error Creating a New quiz question');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
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
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}