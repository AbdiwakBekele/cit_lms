<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CourseCategory;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $categories = CourseCategory::all();
        return view('admin.course_category.adminCourseCategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.course_category.adminAddCourseCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request, [
            'category_name'=>'required|unique:course_categories',
            'category_detail'=>'required'
        ]);

        $category_name = $request->category_name;
        $category_desc = $request->category_detail;

        $category = new CourseCategory([ 
            'category_name'=> $category_name,
            'category_detail'=>$category_desc
         ]);

         $category->save();

         if(!empty($category->id)){
            return back()
            ->with('success','You have successfully created a new course category.');
        }else{
            return back()
            ->with('error','Error Creating a New course category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $category = CourseCategory::find($id);
        return view('admin.course_category.adminEditCourseCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $this->validate($request, [
            'category_name'=>'required',
            'category_detail'=>'required'
        ]);

        $category_name = $request->category_name;
        $category_detail = $request->category_detail;

        $category = CourseCategory::find($id);
        $category->category_name = $category_name;
        $category->category_detail = $category_detail;
        $category->save();

         if(!empty($category->id)){
            return back()
            ->with('success','You have successfully updated a course category information.');
        }else{
            return back()
            ->with('error','Error Updating course category information');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $category = CourseCategory::find($id)->delete();

        if($category){
            return back()
            ->with('success','You have successfully deleted a course category.');
        }else{
            return back()
            ->with('error','Error deleting course category information');
        }
    }
}