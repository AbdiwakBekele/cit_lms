<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\StudentDocument;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class StudentDocController extends Controller
{

    public function __construct()
    {
        $courses = Course::all();
        view()->share('courses', $courses);
    }
    
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

    public function verifyDoc(string $id){
        $student = Student::find($id);
        return view('user_student.verify_profile', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $this->validate($request, [
            'student_id'=> 'required',
            'id_card'=>'required|mimes:png,jpg,jpeg,pdf',
            'edu_docs'=>'required|mimes:pdf,png,jpg,jpeg'
        ]);

        $student_id = $request->student_id;

        // Student Documents
        $id_card = $this->submitDocument($request->file('id_card'), $student_id, 'National ID');
        $edu_docs = $this->submitDocument($request->file('edu_docs'), $student_id, 'Educational');


        if ($id_card->save() && $edu_docs->save()) {
            $student = Auth::guard('student')->user();
            return view('user_student.profile', compact('student'))->with('success', 'Documents submitted successfully. Please wait for your confirmation.');
        } else {
            return back()->with('error', 'Error submitting your documents.');
        }

    }

    // Function to handle document submission
    private function submitDocument($file, $student_id, $document_name){
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('student_docs', $filename);

        return new StudentDocument([
            'student_id' => $student_id,
            'document_name' => $document_name,
            'document_path' => $filename
        ]);
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