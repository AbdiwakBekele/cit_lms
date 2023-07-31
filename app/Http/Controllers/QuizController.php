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

    public function createQuizMultiple(string $course_id, string $section_id){

        $course = Course::find($course_id);
        $section = Section::find($section_id);
        
        return view('admin.course.adminAddSectionQuiz', compact('course', 'section'));
    }

    public function createQuizShort(string $course_id, string $section_id){

        $course = Course::find($course_id);
        $section = Section::find($section_id);
        
        return view('admin.course.adminAddSectionQuizShort', compact('course', 'section'));
    }

    
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

    public function show(string $id){
        //
    }

    public function edit(string $id){
        $quiz = Quiz::find($id);
        return view('admin.course.adminEditQuiz', compact('quiz'));
    }

    public function update(Request $request, string $id){
        $this->validate( $request, [
            'question'=>'required',
            'options' => 'required|array|min:2|max:5',
            'options.*' => 'required',
            'answer'=>'required'
        ]);

        $question =  $request->question;
        $answer = $request->options[($request->answer - 1)];

        $quiz = Quiz::find($id);
        $quiz->question = $question;
        $quiz->answer = $answer;

        if ($quiz->save()) {
            // Deleting the previous Options
            foreach($quiz->quiz_options as $quiz_option){
                $quiz_option->delete();
            }
            // Quiz Option Insert
            foreach ($request->options as $option) {
                QuizOption::create([
                    'quiz_id' => $quiz->id,
                    'option' => $option,
                ]);
            }

            return back()
             ->with('success','You have successfully updated a quiz question.');
        }else{
            return back()
            ->with('error','Error Updating a quiz question');
        }
    }

    public function destroy(string $id){
        $quiz = Quiz::find($id)->delete();

        if($quiz){
            return back()
             ->with('success','You have successfully deleted a quiz question.');
        }else{
            return back()
             ->with('error','Error deleting a quiz question.');
        }
    }
}