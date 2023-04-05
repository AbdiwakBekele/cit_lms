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
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            return view('quiz.quiz', compact('questions'));
        }else if($count == 0) {
            return back()
            ->with('error','Sorry! No Quiz Question Available');
            
        }else{
            $questions = Quiz::where('section_id', $section_id)->get();
            return view('quiz.quiz', compact('questions'));
        }
    }

    public function myQuizSubmit(Request $request){

        echo $request->question_count;
        echo "<br>";
        echo $request->option_1;
        echo "<br>";
        echo $request->option_2;
        echo "<br>";
        echo $request->option_3;
        echo "<br>";

        echo $request;
       
    }

}