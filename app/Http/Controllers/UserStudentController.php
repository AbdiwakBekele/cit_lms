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
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserStudentController extends Controller{
    
    function index(){
        
        $courses = Course::all();
        $course_categories = CourseCategory::all();
        $student_id = Auth::guard('student')->user()->id;
        $classrooms = Classroom::where('student_id', $student_id)->get();
        return view('user_student.mylearning', compact('courses', 'classrooms', 'course_categories'));
    
    }

    function myProfile(){
        $courses = Course::all();
        $student = Auth::guard('student')->user();
        return view('user_student.profile', compact('courses', 'student'));
    }

    function myProfileEdit(String $id){

        $courses = Course::all();
        $student = Student::find($id);
        return view('user_student.profile_edit', compact('courses', 'student'));
    }

    function myProfileUpdate(Request $request, string $id){
        
        $data = $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'subcity'=>'required',
            'house_no'=>'required',
            'facebook'=>'nullable',
            'instagram'=>'nullable',
            'linkedin'=>'nullable',
            'tiktok'=>'nullable',
            'twitter'=>'nullable',
            'level_of_education'=>'required',
            'work_status'=>'required',
            'current_occupation'=>'required',
            'work_experience'=>'required'
        ]);


        $student = Student::find($id);
        $student->fullname = $data['fullname'];
        $student->email = $data['email'];
        $student->age = $data['age'];
        $student->gender = $data['gender'];
        $student->phone = $data['phone'];
        $student->city = $data['city'];
        $student->subcity = $data['subcity'];
        $student->house_no = $data['house_no'];
        $student->facebook = $data['facebook'];
        $student->instagram = $data['instagram'];
        $student->linkedin = $data['linkedin'];
        $student->tiktok = $data['tiktok'];
        $student->twitter = $data['twitter'];
        $student->level_of_education = $data['level_of_education'];
        $student->work_status = $data['work_status'];
        $student->current_occupation = $data['current_occupation'];
        $student->work_experience = $data['work_experience'];

        if($student->save()){
            return redirect('/my_profile')
            ->with('success', 'User account successfully updated');
        }else{
            return back()
                ->with('error', "Error updating user account");
        }
    }

    function myPictureEdit(String $id){

        $courses = Course::all();
        $student = Student::find($id);
        return view('user_student.profile_pic_edit', compact('courses', 'student'));
    }

    function myPictureUpdate(Request $request, string $id){
        
        $request->validate([
            'profile_img'=>'required|mimes:png,jpg,jpeg'
        ]);

        //Profile Image
        $temp_img = $request->file('profile_img');
        $profile_img = pathinfo($temp_img->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_img->getClientOriginalExtension();
        $temp_img->move('student_profile', $profile_img);
        
        $student = Student::find($id);
        $student->profile_img = $profile_img;
        $student->save();

        if($student->save()){
            return redirect('/my_profile')
            ->with('success', 'User account successfully updated');
        }else{
            return back()
                ->with('error', "Error updating user account");
        }
    }

    function mySetting(){
        $courses = Course::all();
        return view('user_student.setting', compact('courses'));
    }

    function changePassword(){
        $courses = Course::all();
        return view('user_student.change_password', compact('courses'));
    }

    function updatePassword(Request $request){

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $student = Auth::guard('student')->user();

        // Check if the old password matches the user's current password
        if (!Hash::check($request->old_password, $student->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        // Update the user's password
        $student->password = Hash::make($request->new_password);
        $student->save();

        return back()->with('success', 'Password updated successfully.');
    
    }

    function courseList(){
        $courses = Course::all();
        $course_categories = CourseCategory::all();
        $top_courses = Course::withCount('classrooms');
        $popular_courses;
        
        if($top_courses->count() >= 3){
            $popular_courses = $top_courses->orderBy('classrooms_count', 'desc')->take(3)->get();
        }else{
            $popular_courses = $top_courses->orderBy('classrooms_count', 'desc')->get();
        }
        return view('user_student.course_list', compact('courses', 'course_categories', 'popular_courses'));
    }

    public function courseSingle(string $id){
        $courses = Course::all();
        $course_categories = CourseCategory::all();
        $course = Course::find($id);
        $top_courses = Course::withCount('classrooms');
        $popular_courses;
        
        if($top_courses->count() >= 3){
            $popular_courses = $top_courses->orderBy('classrooms_count', 'desc')->take(3)->get();
        }else{
            $popular_courses = $top_courses->orderBy('classrooms_count', 'desc')->get();
        }
        
        return view('user_student.course_single', compact('courses','course', 'course_categories', 'popular_courses'));
    }

    public function myCourseSingle(string $course_id, string $classroom_id){
        $popular_courses;
        $courses = Course::all();
        $course_categories = CourseCategory::all();
        $course = Course::find($course_id);
        $top_courses = Course::withCount('classrooms');
        
        if($top_courses->count() >= 3){
            $popular_courses = $top_courses->orderBy('classrooms_count', 'desc')->take(3)->get();
        }else{
            $popular_courses = $top_courses->orderBy('classrooms_count', 'desc')->get();
        }
        
        $sectionCount = Section::whereHas('progress', function($query) use ($classroom_id) {
                    $query->where('classroom_id', $classroom_id)
                        ->where('is_passed', 1);
                    })->count();
                    
        $sections = Section::where('course_id', $course_id)
            ->where('sequence', '<=', $sectionCount + 1)
            ->get();

            $classroom = Classroom::find($classroom_id);

        return view('user_student.my_course_single', compact('courses','course', 'course_categories', 'sections', 'popular_courses', 'classroom_id', 'classroom'));

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

    public function myQuiz(string $section_id, string $classroom_id){
        $count = Quiz::where('section_id', $section_id)->count();
        if ($count != 0  && $count >= 10) {
            $questions = Quiz::where('section_id', $section_id)->take(10)->get();
            return view('quiz.quiz', compact('questions', 'classroom_id', 'section_id'));
        }else if($count == 0) {
            return back()
            ->with('error','Sorry! No Quiz Question Available');
        }else{
            $questions = Quiz::where('section_id', $section_id)->get();
            return view('quiz.quiz', compact('questions', 'classroom_id', 'section_id'));
        }
    }

    public function myQuizSubmit(Request $request){

        $answers = $request->input('answer');
        $classroom_id = $request->classroom_id;
        $section_id = $request->section_id;

        $correct_score = 0;

        if($answers != null){
            foreach ($answers as $questionId => $option) {
                $question = Quiz::find($questionId);

                if($question->answer == $option){
                    $correct_score++;
                }
            }
        }else{
            $answers = [];
        }
        
        //Data to be validated
        $data = [
            'classroom_id' => $classroom_id,
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
            $progress = Progress::where('classroom_id', $classroom_id)
                    ->where('section_id', $section_id)
                    ->first();

            $progress->score = $correct_score;
            if(count($answers) > 0){
                $progress->is_passed = ($correct_score / count($answers) >= 0.5) ? 1 : 0;
            }else{
                $progress->is_passed = 0;
            }
            
            $progress->save();

            return view('quiz.quizResult', compact('correct_score'))
                 ->with('success','You have successfully Submitted your result');

        }else{
            // Validation succeeded
            $progress = new Progress([
                'classroom_id'=> $classroom_id,
                'section_id'=> $section_id, 
                'score'=>$correct_score,
                'is_passed'=> ($correct_score / count($answers) >= 0.5) ? 1 : 0
            ]);
            $progress->save();

            if (!empty($progress->id)) {
                // Model has been successfully inserted
                return view('quiz.quizResult', compact('correct_score'))
                 ->with('success','You have successfully Submitted your result');
            }else{
                return view('quiz.quizResult')
                ->with('error','Error Submitting your result');
            }
        }
    }

    // Final 
    public function myFinal(string $course_id, string $classroom_id){
        $count = Quiz::where('course_id', $course_id)->count();
        if ($count != 0  && $count >= 50) {
            $questions = Quiz::where('course_id', $course_id)->take(50)->inRandomOrder()->get();
            return view('quiz.final', compact('questions', 'classroom_id'));
        }else if($count == 0) {
            return back()
            ->with('error','Sorry! No Quiz Question Available');
            
        }else{
            $questions = Quiz::where('course_id', $course_id)->inRandomOrder()->get();
            return view('quiz.final', compact('questions', 'classroom_id'));
        }
    }

    public function myFinalSubmit(Request $request){

        if(Auth::guard('student')->check()){
            $student_name = Auth::guard('student')->user()->fullname;
            $currentDate = Date::now();
            return view('user_student.certificate', compact('student_name'));
        }
       
    }

    public function disqualify(Request $request){
        $classroomId = $request->input('classroomId');
        $classroom = Classroom::find($classroomId);
        $classroom->is_approved = 0;
        $classroom->save();
    }

}