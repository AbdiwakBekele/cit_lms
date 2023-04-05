<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Section;
use App\Models\Content;
use App\Models\Course;
use App\Models\Resource;

class ContentController extends Controller
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
    public function create(): Response
    {
        //
    }

    public function createContent(string $id){
        $section = Section::find($id);
        return view('admin.course.adminCreateCourseContent', compact('section'));
    }

    public function createResource(string $course_id, string $content_id){
        $course = Course::find($course_id);
        $content = Content::find($content_id);
        return view('admin.course.adminCreateCourseContentResource', compact('content', 'course'));
    }

    public function storeResource(Request $request){

        $this->validate( $request, [
            'course_id'=> 'required',
            'content_id'=> 'required',
            'course_resource'=>'required|array',
            'course_resource.*'=>'mimes:docx,pdf,pptx'
        ]);

        $course_id =  $request->course_id;
        $content_id =  $request->content_id;
        //Course Resource
        $files = $request->file('course_resource');
        $status = true;

        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$extension;
            $file->move('course_resources', $filename);
            $resource = new Resource([
                'course_id'=> $course_id,
                'content_id'=> $content_id,
                'path'=> $filename
            ]);
            $resource->save();
            if(!$resource){
                $status = false;
                break;
            }
        }
        
        // Model has been successfully inserted
        if($status){
            return back()
             ->with('success','You have successfully created a new course.');
        }else{
            return back()
             ->with('error','Error creating a resource');
        }
        
    }

    public function store(Request $request){
        $this->validate( $request, [
            'section_id'=>'required',
            'content_name'=>'required|unique:contents',
            'description'=>'required'
        ]);

        $section_id =  $request->section_id;
        $content_name =  $request->content_name;
        $description =  $request->description;

        $content = new Content([
            'section_id'=> $section_id,
            'content_name'=> $content_name, 
            'content_description'=>$description]);

        $content->save();

        if (!empty($content->id)) {
        
            return back()
             ->with('success','You have successfully created a new content for this section.');
        }else{
            return back()
            ->with('error','Error Creating a New content');
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