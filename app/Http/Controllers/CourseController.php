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
        $role = Role::where('role_name', 'Teacher Coordinator')->first();
        if($role){
            $coordinators = User::where('role_id', $role->id)->get();
        }else{
            $coordinators = [];
        }
        
        return view('admin.course.adminAddCourse', compact('categories', 'coordinators'));
    }

    // Create Course Section
    public function createSection(string $id){
        $course = Course::find($id);
        return view('admin.course.adminCreateCourseSection', compact('course'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $this->validate( $request, [
            'course_name'=>'required|unique:courses',
            'short_name'=>'required|unique:courses',
            'course_category'=>'required',
            'description'=>'required',
            'course_image'=>'required|mimes:png,jpg,jpeg',
            'course_intro'=>'required|mimes:mp4,mkv,avi,flv',
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

         //course_intro
         $temp_intro = $request->file('course_intro');
         $course_intro = pathinfo($temp_intro->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_intro->getClientOriginalExtension();
         $temp_intro->move('course_resources', $course_intro);
        
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
    
    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $course = Course::find($id);
        $category = CourseCategory::where('id', $course->course_category_id)->first();
        $sections = Section::where('course_id', $course->id)->get();
        
        return view('admin.course.adminViewCourse', compact('course', 'category', 'sections'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $categories = CourseCategory::all();
        $role = Role::where('role_name', 'Teacher Coordinator')->first();
        $coordinators = User::where('role_id', $role->id)->get();
        $course = Course::find($id);
        return view('admin.course.adminEditCourse', compact('categories', 'coordinators', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){

        $this->validate( $request, [
            'course_name'=>'required',
            'short_name'=>'required',
            'course_category'=>'required',
            'description'=>'required',
            'assigned_coordinator'=>'required'
        ]);
        
        $course_name =  $request->course_name;
        $short_name =  $request->short_name;
        $course_category =  $request->course_category;
        $description = $request->description;
        $assigned_coordinator = $request->assigned_coordinator;

        $course = Course::find($id);
        $course->course_name = $course_name;
        $course->short_name = $short_name;
        $course->description = $description;
        $course->course_category_id = $course_category;
        $course->user_id = $assigned_coordinator;
        $course->save();


        if(!empty($course->id)){

            return back()
             ->with('success','You have successfully updated a course informatoin.');
        }else{
            return back()
            ->with('error','Error updating course information');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $course = Course::find($id)->delete();
        $resources = Resource::where('course_id', $id)->get();

        foreach($resources as $resource){
            File::delete(public_path('course_resources/'.$resource->path));
            $resource->delete();
        }
        

        if($resource){
            return back()
             ->with('success','You have successfully deleted a course informatoin.');
        }else{
            return back()
            ->with('error','Error deleting course information');
        }

    }
}