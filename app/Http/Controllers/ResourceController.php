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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResourceController extends Controller{

    public function index(){
        $resources = Resource::all();
        return view('admin.resource_managment.adminResource', compact('resources'));
    }
    
    public function create(){
        $courses = Course::all();
        return view('admin.resource_managment.adminAddResource', compact('courses'));
    }

    public function viewDoc($filename){
        $filePath = public_path('course_resources/' . $filename);

        if (file_exists($filePath)) {
            $fileContents = file_get_contents($filePath);

            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
                'Content-Length' => strlen($fileContents),
            ];

            return FileResponse::make($fileContents, 200, $headers);
        }
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

    public function show(string $id){
        //
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        //
    }

    public function destroy(string $id, Request $request){

        $this->validate($request, [
            'password'=>'required'
        ]);
        
        $user = Auth::user();
        if(Hash::check($request->password, $user->password)){
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
        }else{
            return back()
                ->with('error','Incorrect Password');
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