<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Course;
use App\Models\Scholarship;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response as FileResponse;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $scholarships = Scholarship::all();
        return view('admin.scholarship_management.scholarship', compact('scholarships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $courses = Course::all();
        return view('user_student.scholarshipForm', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'resume'=>'mimes:pdf', 
            'financial'=>'mimes:pdf'
        ]);
        
        $data_scholar = $request->validate([
            'fullname'=>'required',
            'email'=>'required|unique:scholarships',
            'age'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'subcity'=>'required',
            
            'level_of_education'=>'required',
            'work_status'=>'required',
            'current_occupation'=>'required',
            'work_experience'=>'required', 

            'course_id'=>'required', 
            'essay'=>'required'
        ]);

        if($request->hasFile('resume')){
            // Resume Upload
            $temp_resume = $request->file('resume');
            $resume = pathinfo($temp_resume->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_resume->getClientOriginalExtension();
            $temp_resume->move('scholarship_applications', $resume);
            $data_scholar['resume'] = $resume;
        }

        if($request->hasFile('financial')){
            // Financial Upload
            $temp_financial = $request->file('financial');
            $financial = pathinfo($temp_financial->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$temp_financial->getClientOriginalExtension();
            $temp_financial->move('scholarship_applications', $financial);
            $data_scholar['financial'] = $financial;
        }


        $scholarship = Scholarship::create($data_scholar);

        if($scholarship){
            return back()->with('success', 'Successfully applied for scholarship');
        }else{
            return back()->with('error', 'Error applying for scholarship');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $scholarship = Scholarship::find($id);
        return view('admin.scholarship_management.viewScholarship', compact('scholarship'));
    }

    public function viewScholarshipDoc($filename){
        $filePath = public_path('scholarship_applications/' . $filename);

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
    public function destroy(string $id, Request $request ){
        $this->validate($request, [
            'password'=>'required'
        ]);

        $user = Auth::user();
        if(Hash::check($request->password, $user->password)){
            $scholarship = Scholarship::find($id);
            File::delete(public_path('scholarship_applications/'.$scholarship->resume));
            File::delete(public_path('scholarship_applications/'.$scholarship->financial));
            $scholarship->delete();

            if($scholarship){
                return back()
                ->with('success','You have successfully delete a scholarship info.');
            }else{
                return back()
                ->with('error','Error deleting scholarship.');
            }
        }else{
            return back()
                ->with('error','Incorrect Password');
        }
    }
}