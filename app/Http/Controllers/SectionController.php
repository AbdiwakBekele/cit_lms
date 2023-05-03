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
            'description'=>'required'
        ]);

        $course_id =  $request->course_id;
        $section_name =  $request->section_name;
        $section_sequence = Course::find($course_id)->sections()->count() + 1;
        $section_description =  $request->description;

        $section = new Section([
            'course_id'=> $course_id,
            'section_name'=> $section_name, 
            'sequence'=>$section_sequence,
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
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}