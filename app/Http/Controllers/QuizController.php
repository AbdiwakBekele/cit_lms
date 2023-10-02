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
use App\Models\Match_Row;
use App\Models\Match_Column;
use File;

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

    public function createQuizMatch(string $course_id, string $content_id){
        $course = Course::find($course_id);
        $content = Content::find($content_id);
        
        return view('admin.course.adminAddContentQuizMatch', compact('course', 'content'));
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
            'question_image'=> 'image|mimes:png,jpg,jpeg,webp',
            'points'=>'required',
            'options' => 'required|array|min:2|max:5',
            'options.*' => 'required',
            'options_img.*' => 'image|mimes:jpeg,png,jpg,webp',
            'answer'=>'required'
        ]);

        // $course_id =  $request->course_id;
        // $content_id =  $request->content_id;
        // $question =  $request->question;
        // $points =  $request->points;
        // $answer = $request->options[($request->answer - 1)];
        // $type = '1'; // Quiz type 1 -  Multiple Choice

        $quiz_data = [
            'course_id'=> $request->course_id,
            'content_id'=> $request->content_id, 
            'question'=>$request->question,
            'answer'=> $request->options[($request->answer - 1)],
            'points'=>$request->points,
            'type'=> '1', // Quiz type 1 - Multiple Choice
        ];

        // If Quiz Image is Available
        if($request->hasFile('question_image')){
            $temp_img = $request->file('question_image');
            $question_image = pathinfo($temp_img->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_img->getClientOriginalExtension();
            $temp_img->move('question_images', $question_image);
            $quiz_data['question_image'] = $question_image;
        }

        $quiz = new Quiz($quiz_data);

        $quiz->save();
        if (!empty($quiz->id)) {
            // Quiz Option Insert

            foreach ($request->input('options') as $key => $optionText) {
                $option = new QuizOption;
                $option->quiz_id = $quiz->id;
                $option->option = $optionText;

                if ($request->hasFile('options_img.' . $key)) {
                    $temp_img_option = $request->file('options_img.' . $key);
                    $option_image = pathinfo($temp_img_option->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_img_option->getClientOriginalExtension();
                    $temp_img_option->move('question_images', $option_image);
                    $option->option_image = $option_image;
                }
                $option->save(); 
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
            'question'=>'required',
            'points'=>'required'
        ]);

        $course_id =  $request->course_id;
        $content_id =  $request->content_id;
        $question =  $request->question;
        $points =  $request->points;
        $type = '2';  //Quiz Type 2 - Short Answer

        $quiz = new Quiz([
            'course_id'=> $course_id,
            'content_id'=> $content_id, 
            'question'=>$question,
            'points'=>$points,
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

    //  Storing Quiz - Matching
    public function storeMatchQuestion(Request $request){
        $this->validate( $request, [
            'course_id'=>'required',
            'content_id'=>'required',
            'question'=>'required',
            'points'=>'required',
            'answer_rows' => 'required|array|min:2',
            'answer_rows.*' => 'required',
            'answer_columns' => 'required|array|min:2',
            'answer_columns.*' => 'required'
        ]);

        $course_id =  $request->course_id;
        $content_id =  $request->content_id;
        $question =  $request->question;
        $points =  $request->points;
        $type = '3'; // Quiz type 3 -  Matching

        $quiz = new Quiz([
            'course_id'=> $course_id,
            'content_id'=> $content_id, 
            'question'=>$question,
            'points'=>$points,
            'type'=> $type
        ]);

        if ($quiz->save()) {
            // Matching Row Inserting
            foreach ($request->answer_rows as $answer_row) {
                Match_Row::create([
                    'quiz_id' => $quiz->id,
                    'row_content' => $answer_row
                ]);
            }

            // Matching Column Inserting
            foreach ($request->answer_columns as $answer_column) {
                Match_Column::create([
                    'quiz_id' => $quiz->id,
                    'column_content' => $answer_column
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
        $quiz = Quiz::find($id);
        $options = $quiz->quiz_options;

        if($quiz->question_image != null){
            File::delete(public_path('question_images/'.$quiz->question_image));
        }

        foreach($options as $option){
            File::delete(public_path('question_images/'.$option->option_image));
        }

        $quiz->delete();

        if($quiz){
            return back()
             ->with('success','You have successfully deleted a quiz question.');
        }else{
            return back()
             ->with('error','Error deleting a quiz question.');
        }
    }
}