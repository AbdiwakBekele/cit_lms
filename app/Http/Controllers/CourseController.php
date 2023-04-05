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
        $role = Role::where('role_name', 'Teacher Coordinator')->firstOrFail();
        $coordinators = User::where('role_id', $role->id)->get();
        return view('admin.course.adminAddCourse', compact('categories', 'coordinators'));
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
            'course_resource'=>'required|array',
            'course_resource.*'=>'mimes:docx,pdf,pptx',
            'assigned_coordinator'=>'required'
        ]);

        $course_name =  $request->course_name;
        $short_name =  $request->short_name;
        $course_category =  $request->course_category;
        $description = $request->description;
        $assigned_coordinator = $request->assigned_coordinator;
        //course_image
        $temp_img = $request->file('course_image');
        $course_image = pathinfo($temp_img->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_img->getClientOriginalExtension();
        $temp_img->move('course_resources', $course_image);
        //Course Resource
        $files = $request->file('course_resource');

        $course = new Course([
            'course_category_id'=> $course_category,
            'course_name'=> $course_name, 
            'short_name'=>$short_name, 
            'description'=>$description,
            'course_image'=>$course_image,
            'user_id'=> $assigned_coordinator]);

        $course->save();

        if (!empty($course->id)) {
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$extension;
                $file->move('course_resources', $filename);
                $resource = new Resource([
                    'course_id'=> $course->id,
                    'path'=> $filename
                ]);
                $resource->save();
            }
            
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