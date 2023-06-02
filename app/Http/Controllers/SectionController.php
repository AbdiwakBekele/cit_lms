<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Course;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate( $request, [
            'course_id'=>'required',
            'section_name' => 'required|unique:sections,section_name,NULL,id,course_id,'.$request->course_id,
            'duration'=>'required',
            'description'=>'required'
        ]);

        $course_id =  $request->course_id;
        $section_name =  $request->section_name;
        $duration = $request->duration;
        $section_sequence = Course::find($course_id)->sections()->count() + 1;
        $section_description =  $request->description;

        $section = new Section([
            'course_id'=> $course_id,
            'section_name'=> $section_name, 
            'sequence'=>$section_sequence,
            'duration'=>$duration,
            'section_description'=>$section_description]);

        $section->save();

        if (!empty($section->id)) {
            return back()
             ->with('success','You have successfully created a new Section.');
        }else{
            return back()
            ->with('error','Error Creating a New Section');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $section = Section::find($id);
        return view('admin.course.adminEditCourseSection', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){

        $this->validate( $request, [
            'section_name' => 'required',
            'duration'=>'required',
            'description'=>'required'
        ]);

        $section_name =  $request->section_name;
        $duration = $request->duration;
        $section_description =  $request->description;
    
        $section = Section::find($id);
        $section->section_name = $section_name;
        $section->duration = $duration;
        $section->section_description = $section_description;
        $section->save();

        if(!empty($section->id)){

            return back()
             ->with('success','You have successfully updated section informatoin.');
        }else{
            return back()
            ->with('error','Error updating section information');
        }
    }

    public function destroy(string $id){
        $section = Section::find($id)->delete();

        if($section){
            return back()
            ->with('success', 'Successfuly Deleted Course Section');
        }else{
            return back()
            ->with('error', "Error Deleting Course Section");
        }
    }
}