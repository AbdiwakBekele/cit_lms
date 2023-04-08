<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\User;
use App\Models\Batch;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Quiz;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserStudentController extends Controller{
    
    function index(){
        $courses = Course::all();
        return view('home', compact('courses'));
    }
    
    function about(){
        return view('about');
    }

    function events(){
        return view('events');
    }

    function eventSingle(){
        return view('eventSingle');
    }

    function instructors(){
        return view('instructors');
    }

    function blog(){
        return view('blog');
    }
    
    function contact(){
        return view('contact');
    }

    function courseList(){
        $courses = Course::all();
        $course_categories = CourseCategory::all();
        return view('user_student.course_list', compact('courses', 'course_categories'));
    }

    public function courseSingle(string $id){
        $course = Course::find($id);
        $sections = Section::where('course_id', $course->id)->get();
        $user = User::find($course->user_id);
        $course_category = CourseCategory::find($course->course_category_id);
        $course_categories = CourseCategory::all();
        return view('user_student.course_single', compact('course', 'user', 'course_category', 'course_categories', 'sections'));
    }

    public function myCourseSingle(string $id){
        $course = Course::find($id);
        $sections = Section::where('course_id', $course->id)->get();
        $user = User::find($course->user_id);
        $course_category = CourseCategory::find($course->course_category_id);
        $course_categories = CourseCategory::all();
        return view('user_student.my_course_single', compact('course', 'user', 'course_category', 'course_categories', 'sections'));
    }

    public function enrollCourse(string $id){
        //Checking User Auth
        if(Auth::guard('student')->check()){
            $course = Course::find($id);
            $user = User::find($course->user_id);
            $course_category = CourseCategory::find($course->course_category_id);
            $course_categories = CourseCategory::all();
            $batches = Batch::where('course_id', $course->id)->get();
            return view('user_student.courseEnroll', compact('course', 'batches', 'user', 'course_category', 'course_categories'));
        }else{
            return view('user_student.student_login');
        }
    }

    public function enrollNow(Request $request){
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
            'is_approved'=>0
        ]);

        $classroom->save();

        if (!empty($classroom->id)) {
            // Model has been successfully inserted
            return back()
             ->with('success','You have successfully Registered for this batch, Please wait for the approval to start the class');
        }else{
            return back()
            ->with('error','Error registering for this batch');
        }

    }

    public function myLearning(){
        if(Auth::guard('student')->check()){
            $student_id = Auth::guard('student')->user()->id;
            $classrooms = Classroom::where('student_id', $student_id)->get();
            $course_categories = CourseCategory::all();
            return view('user_student.mylearning', compact('classrooms', 'course_categories'));
        }

        return view('user_student.student_login');
    }

    public function myQuiz(string $section_id){
        $count = Quiz::where('section_id', $section_id)->count();
        if ($count != 0  && $count >= 10) {
            $questions = Quiz::where('section_id', $section_id)->take(10)->get();
            // return view('quiz.quiz', compact('questions'));
            return view('quiz.quiz', compact('questions'));
        }else if($count == 0) {
            return back()
            ->with('error','Sorry! No Quiz Question Available');
            
        }else{
            $questions = Quiz::where('section_id', $section_id)->get();
            // return view('quiz.quiz', compact('questions'));
            return view('quiz.quiz', compact('questions'));
        }
    }

    public function myQuizSubmit(Request $request){

        $answers = $request->input('answer');
        $student_id = $request->student_id;
        $correct_score = 0;
        $course_id;
        $section_id;

       

        foreach ($answers as $questionId => $option) {
            $question = Quiz::find($questionId);
            $course_id = $question->course_id;
            $section_id = $question->section_id;

            if($question->answer == $option){
                $correct_score++;
            }
        }

        $classroom = Classroom::where('student_id', $student_id)->where('course_id', $course_id)->first();
        
        //Data to be validated
        $data = [
            'classroom_id' => $classroom->id,
            'section_id' => $section_id
        ];
        
        //Rules to be checked
        $rules = [
            'classroom_id' => [
                'required',
                Rule::unique('progress')->where(function ($query) use ($data) {
                    return $query->where('section_id', $data['section_id']);
                })
            ]
        ];
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->fails()) {
            // Validation failed
            // $errors = $validator->errors();

            return view('quiz.quizResult', compact('correct_score', 'course_id'))
                 ->with('success','You have successfully Submitted your result');

        } else {
            // Validation succeeded
            $progress = new Progress([
                'classroom_id'=> $classroom->id,
                'section_id'=> $section_id, 
                'score'=>$correct_score
            ]);
            
            $progress->save();

            if (!empty($progress->id)) {
                // Model has been successfully inserted
                return view('quiz.quizResult', compact('correct_score', 'course_id'))
                 ->with('success','You have successfully Submitted your result');
            }else{
                return view('quiz.quizResult')
                ->with('error','Error Submitting your result');
            }

        }
       
    }

    // Final 
    public function myFinal(string $course_id){
        $count = Quiz::where('course_id', $course_id)->count();
        if ($count != 0  && $count >= 50) {
            $questions = Quiz::where('course_id', $course_id)->take(50)->inRandomOrder()->get();
            // return view('quiz.quiz', compact('questions'));
            return view('quiz.final', compact('questions'));
        }else if($count == 0) {
            return back()
            ->with('error','Sorry! No Quiz Question Available');
            
        }else{
            $questions = Quiz::where('course_id', $course_id)->inRandomOrder()->get();
            // return view('quiz.quiz', compact('questions'));
            return view('quiz.final', compact('questions'));
        }
    }

    public function myFinalSubmit(Request $request){
        

        return view('user_student.certificate');
       
    }

}