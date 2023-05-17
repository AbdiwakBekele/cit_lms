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
use Illuminate\Support\Facades\Date;

class UserStudentController extends Controller{
    
    function index(){
        $courses = Course::all();
        return view('home', compact('courses'));
    }
    
    function about(){
        $courses = Course::all();
        return view('about', compact('courses'));
    }

    function events(){
        $courses = Course::all();
        return view('events', compact('courses'));
    }

    function eventSingle(){
        $courses = Course::all();
        return view('eventSingle', compact('courses'));
    }

    function instructors(){
        $courses = Course::all();
        return view('instructors', compact('courses'));
    }

    function blog(){
        $courses = Course::all();
        return view('blog', compact('courses'));
    }
    
    function contact(){
        $courses = Course::all();
        return view('contact', compact('courses'));
    }

    function courseList(){
        $courses = Course::all();
        $course_categories = CourseCategory::all();
        $top_courses = Course::withCount('classrooms');

        if($top_courses->count() >= 3){
            $popular_courses = $top_courses->orderBy('classrooms_count', 'desc')->take(3)->get();
            return view('user_student.course_list', compact('courses', 'course_categories', 'popular_courses'));
        }else{
            $popular_courses = $top_courses->orderBy('classrooms_count', 'desc')->get();
            return view('user_student.course_list', compact('courses', 'course_categories', 'popular_courses'));
        }
    }

    public function courseSingle(string $id){
        $courses = Course::all();
        $course = Course::find($id);
        $sections = Section::where('course_id', $course->id)->get();
        $user = User::find($course->user_id);
        $course_category = CourseCategory::find($course->course_category_id);
        $course_categories = CourseCategory::all();
        return view('user_student.course_single', compact('courses','course', 'user', 'course_category', 'course_categories', 'sections'));
    }

    public function myCourseSingle(string $course_id, string $classroom_id){
        $courses = Course::all();

         $course = Course::find($course_id);
        $user = User::find($course->user_id);
        $course_category = CourseCategory::find($course->course_category_id);
        $course_categories = CourseCategory::all();

        $sectionCount = Section::whereHas('progress', function($query) use ($classroom_id) {
                    $query->where('classroom_id', $classroom_id)
                        ->where('is_passed', 1);
                    })->count();
                    
        $sections = Section::where('course_id', $course_id)
            ->where('sequence', '<=', $sectionCount + 1)
            ->get();

        return view('user_student.my_course_single', compact('courses','course', 'user', 'course_category', 'course_categories', 'sections'));


    }

    public function enrollCourse(string $id){
        //Checking User Auth
        if(Auth::guard('student')->check()){
            $courses = Course::all();
            $course = Course::find($id);
            $user = User::find($course->user_id);
            $course_category = CourseCategory::find($course->course_category_id);
            $course_categories = CourseCategory::all();
            $batches = Batch::where('course_id', $course->id)->get();
            return view('user_student.courseEnroll', compact('courses', 'course', 'batches', 'user', 'course_category', 'course_categories'));
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

        if(!empty($classroom->id)){
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
            $courses = Course::all();
            $student_id = Auth::guard('student')->user()->id;
            $classrooms = Classroom::where('student_id', $student_id)->get();
            $course_categories = CourseCategory::all();
            return view('user_student.mylearning', compact('courses', 'classrooms', 'course_categories'));
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
            
            $progress = Progress::where('classroom_id', $classroom->id)
                    ->where('section_id', $section_id)
                    ->first();

            $progress->score = $correct_score;
            $progress->is_passed = ($correct_score / count($answers) >= 0.5) ? 1 : 0;
            $progress->save();

            return view('quiz.quizResult', compact('correct_score', 'course_id'))
                 ->with('success','You have successfully Submitted your result');

        }else{
            // Validation succeeded

            $progress = new Progress([
                'classroom_id'=> $classroom->id,
                'section_id'=> $section_id, 
                'score'=>$correct_score,
                'is_passed'=> ($correct_score / count($answers) >= 0.5) ? 1 : 0
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

        if(Auth::guard('student')->check()){
            $student_name = Auth::guard('student')->user()->fullname;
            $currentDate = Date::now();
            return view('user_student.certificate', compact('student_name'));
        }

        

        
       
    }

}