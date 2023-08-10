<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Course;
use App\Models\Section;
use App\Models\Content;
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

    public function createQuizMultiple(string $course_id, string $content_id){

        $course = Course::find($course_id);
        $content = Content::find($content_id);
        
        return view('admin.course.adminAddContentQuiz', compact('course', 'content'));
    }

    public function createQuizShort(string $course_id, string $content_id){

        $course = Course::find($course_id);
        $content = Content::find($content_id);
        
        return view('admin.course.adminAddContentQuizShort', compact('course', 'content'));
    }

    // Storing Quiz - Multiple Questions
    public function store(Request $request){
        $this->validate( $request, [
            'course_id'=>'required',
            'content_id'=>'required',
            'question'=>'required',
            'options' => 'required|array|min:2|max:5',
            'options.*' => 'required',
            'answer'=>'required'
        ]);

        $course_id =  $request->course_id;
        $content_id =  $request->content_id;
        $question =  $request->question;
        $answer = $request->options[($request->answer - 1)];
        $type = '1'; // Quiz type 1 -  Multiple Choice

        $quiz = new Quiz([
            'course_id'=> $course_id,
            'content_id'=> $content_id, 
            'question'=>$question,
            'answer'=> $answer,
            'type'=> $type
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

    //  Storing Quiz - Short Answer
    public function storeShortQuestion(Request $request){
        $this->validate( $request, [
            'course_id'=>'required',
            'content_id'=>'required',
            'question'=>'required'
        ]);

        $course_id =  $request->course_id;
        $content_id =  $request->content_id;
        $question =  $request->question;
        $type = '2';  //Quiz Type 2 - Short Answer

        $quiz = new Quiz([
            'course_id'=> $course_id,
            'content_id'=> $content_id, 
            'question'=>$question,
            'type'=> $type  
        ]);

        if ($quiz->save()) {

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