<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomApiController extends Controller
{
    public function index($student_id)
    {
        try{

        
            $classrooms = Classroom::where('student_id', $student_id)->get();
            $data = [];
    
            foreach ($classrooms as $classroom) {
                $course = $classroom->course;
                $sections = $course->sections;
                $contents = [];

                foreach ($sections as $section) {
                    $contents[] = $section->contents;
                }

                $data[] = [
                    'classroom' => $classroom,
                ];
            }
            return response()->json($data);
        }catch(Exception $e){
            return response()->json('error', 'Error fetching data'. $e  );
        }
        
    }
}