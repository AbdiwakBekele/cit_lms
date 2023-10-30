<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\User;
use App\Models\Role;
use App\Models\Resource;
use App\Models\Section;
use File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $courses = Course::all();
        return view('admin.course.adminCourseManagement', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $categories = CourseCategory::all();
        try{
            $coordinators = User::role('Coordinator')->get();
        }catch(\Spatie\Permission\Exceptions\RoleDoesNotExist $e){
            $coordinators = [];
        }
    
        return view('admin.course.adminAddCourse', compact('categories', 'coordinators'));
    }

    // Create Course Section
    public function createSection(string $id){
        $course = Course::find($id);
        return view('admin.course.adminCreateCourseSection', compact('course'));
    }
    
    public function store(Request $request){

        $course_intro = null;

        $this->validate( $request, [
            'course_name'=>'required|unique:courses',
            'short_name'=>'required|unique:courses',
            'course_category'=>'required',
            'description'=>'required',
            'course_image'=>'required|mimes:png,jpg,jpeg,webp',
            'course_intro'=>'nullable|mimes:mp4,mkv,avi,flv',
            'course_duration'=>'required',
            'course_price'=>'required'
        ]);

        $course_name =  $request->course_name;
        $short_name =  $request->short_name;
        $course_category =  $request->course_category;
        $description = $request->description;
        $course_duration = $request->course_duration;
        $course_price = $request->course_price;
        $assigned_coordinator = $request->assigned_coordinator;
        
        //course_image
        $temp_img = $request->file('course_image');
        $course_image = pathinfo($temp_img->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_img->getClientOriginalExtension();
        $temp_img->move('course_resources', $course_image);

        if($request->hasFile('course_intro')){
            //course_intro
            $temp_intro = $request->file('course_intro');
            $course_intro = pathinfo($temp_intro->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_intro->getClientOriginalExtension();
            $temp_intro->move('course_resources', $course_intro);
        }
        
        $course = new Course([
            'course_category_id'=> $course_category,
            'course_name'=> $course_name, 
            'short_name'=>$short_name, 
            'description'=>$description,
            'course_image'=>$course_image,
            'course_intro'=>$course_intro,
            'course_duration'=>$course_duration,
            'course_price'=>$course_price,
            'user_id'=> $assigned_coordinator]);

        $course->save();

        if (!empty($course->id)) {
            // Model has been successfully inserted
            return back()
             ->with('success','You have successfully created a new course.');
        }else{
            return back()
            ->with('error','Error Creating a New course');
        }
    }
    
    public function show(string $id){
        $course = Course::find($id);
        $category = CourseCategory::where('id', $course->course_category_id)->first();
        $sections = Section::where('course_id', $course->id)->get();
        
        return view('admin.course.adminViewCourse', compact('course', 'category', 'sections'));
    }

    public function edit(string $id){
        $categories = CourseCategory::all();
        $course = Course::find($id);

        try{
            $coordinators = User::role('Coordinator')->get();
        }catch(\Spatie\Permission\Exceptions\RoleDoesNotExist $e){
            $coordinators = [];
        }

        return view('admin.course.adminEditCourse', compact('categories', 'course', 'coordinators'));
    }

    public function update(Request $request, string $id){

        $this->validate( $request, [
            'course_name'=>[
                'required',
                Rule::unique('courses')->ignore($id),
            ],
            'short_name'=>[
                'required',
                Rule::unique('courses')->ignore($id),
            ],
            'course_category'=>'required',
            'description'=>'required',
            'course_duration'=>'required',
            'course_price'=>'required'
        ]);
        
        $course_name =  $request->course_name;
        $short_name =  $request->short_name;
        $course_category =  $request->course_category;
        $description = $request->description;
        $course_duration = $request->course_duration;
        $course_price = $request->course_price;

        $course = Course::find($id);
        $course->course_name = $course_name;
        $course->short_name = $short_name;
        $course->description = $description;
        $course->course_category_id = $course_category;
        $course->course_duration = $course_duration;
        $course->course_price = $course_price;
        $course->save();


        if(!empty($course->id)){

            return back()
             ->with('success','You have successfully updated a course informatoin.');
        }else{
            return back()
            ->with('error','Error updating course information');
        }
    }

    public function updateThumbnail(Request $request, string $course_id){

        $request->validate([
            'course_thumbnail' => 'required|mimes:png,jpg,jpeg,JPG,JPEG',
        ]);

        //Course Thumbnail
        $temp_img = $request->file('course_thumbnail');
        $course_thumbnail = pathinfo($temp_img->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_img->getClientOriginalExtension();
        $temp_img->move('course_resources', $course_thumbnail);
        
        $course = Course::find($course_id);
        File::delete(public_path('course_resources/'.$course->course_image));

        $course->course_image = $course_thumbnail;

        if($course->save()){
            return back()
            ->with('success', 'Course Thumbnail successfully updated');
        }else{
            return back()
                ->with('error', "Error updating coures thumbnail");
        }

    }

    public function destroy(string $id, Request $request){
        $this->validate($request, [
            'password'=>'required'
        ]);
        $user = Auth::user();
        if(Hash::check($request->password, $user->password)){
            $course = Course::find($id)->delete();
            $resources = Resource::where('course_id', $id)->get();

            foreach($resources as $resource){
                File::delete(public_path('course_resources/'.$resource->path));
                $resource->delete();
            }

            if($course){
                return back()
                ->with('success','You have successfully deleted a course informatoin.');
            }else{
                return back()
                ->with('error','Error deleting course information');
            }
        }else{
            return back()
                ->with('error','Incorrect Password');
        }
        
    }

}