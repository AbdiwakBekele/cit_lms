<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Course;
use App\Models\Section;
use App\Models\Quiz;
use App\Models\QuizOption;

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
            'options' => 'required|array|min:2|max:5',
            'options.*' => 'required',
            'answer'=>'required'
        ]);


        $course_id =  $request->course_id;
        $section_id =  $request->section_id;
        $question =  $request->question;
        $answer = $request->options[($request->answer - 1)];

        $quiz = new Quiz([
            'course_id'=> $course_id,
            'section_id'=> $section_id, 
            'question'=>$question,
            'answer'=> $answer
        ]);

        $quiz->save();
    
        // return redirect()->route('quiz.index')->with('success', 'Question created successfully!');
    

        if (!empty($quiz->id)) {
            // Quiz Option Insert

            foreach ($request->options as $option) {
                QuizOption::create([
                    'quiz_id' => $quiz->id,
                    'option' => $option,
                ]);
            }

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