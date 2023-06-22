<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as FileResponse;
use Illuminate\Http\Response;
use File;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $resources = Resource::all();
        return view('admin.resource_managment.adminResource', compact('resources'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $courses = Course::all();
        return view('admin.resource_managment.adminAddResource', compact('courses'));
    }

    public function viewDoc($filename){

        $filePath = public_path('course_resources/' . $filename);

        // if (file_exists($filePath)) {
        //     return FileResponse::file($filePath);
        // }

        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => mime_content_type($filePath),
            ];
    
            return response()->file($filePath, $headers);
        }

        abort(404);

    }


    public function store(Request $request){
        
        $this->validate( $request, [
            'course'=>'required',
            'course_resource'=>'required|array',
            'course_resource.*'=>'mimes:docx,pdf,pptx'
        ]);

        $course_id =  $request->course;
        //Course Resource
        $files = $request->file('course_resource');
        $status = true;

        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$extension;
            $file->move('course_resources', $filename);
            $resource = new Resource([
                'course_id'=> $course_id,
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

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
    public function destroy(string $id){
        $resource = Resource::find($id);
        File::delete(public_path('course_resources/'.$resource->path));
        $resource->delete();

        if($resource){
            return back()
            ->with('success','You have successfully delete a resource.');
        }else{
            return back()
            ->with('error','Error deleting resource.');
        }
    }

    //For downloading resources - Admin
    public function getDownload(string $id){
        $resource = Resource::find($id);
        $file = public_path(). "/course_resources/$resource->path";

        $headers = ['Content-Type: */*'];

        if (file_exists($file)) {
            return \Response::download($file, $resource->path, $headers);
        } else {
            echo('File not found.');
        }
    }

    // Download Resource - For Students
    public function getDownloadStu(string $id){
        $resource = Resource::find($id);
        $file = public_path(). "/course_resources/$resource->path";

        $headers = ['Content-Type: */*'];

        if (file_exists($file)) {
            return \Response::download($file, $resource->path, $headers);
        } else {
            echo('File not found.');
        }
    }
}