<?php

namespace App\Http\Controllers;

use App\Models\ClassroomResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassroomResultController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        $validatedData = $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'theory_l01' => 'required|numeric',
            'theory_l02' => 'required|numeric',
            'theory_l03' => 'required|numeric',
            'theory_l04' => 'required|numeric',

            'practice_l01' => 'required|numeric',
            'practice_l02' => 'required|numeric',
            'practice_l03' => 'required|numeric',
            'practice_l04' => 'required|numeric',

            'cooperative_l01' => 'required|numeric',
            'cooperative_l02' => 'required|numeric',
            'cooperative_l03' => 'required|numeric',
            'cooperative_l04' => 'required|numeric',
        ]);

        // Calculate averages
        $theory_avg = (
            $validatedData['theory_l01'] +
            $validatedData['theory_l02'] +
            $validatedData['theory_l03'] +
            $validatedData['theory_l04']
        ) / 4;

        $practice_avg = (
            $validatedData['practice_l01'] +
            $validatedData['practice_l02'] +
            $validatedData['practice_l03'] +
            $validatedData['practice_l04']
        ) / 4;

        $cooperative_avg = (
            $validatedData['cooperative_l01'] +
            $validatedData['cooperative_l02'] +
            $validatedData['cooperative_l03'] +
            $validatedData['cooperative_l04']
        ) / 4;

        $attributes = [
            'classroom_id' => $validatedData['classroom_id'],
        ];

        // Calculate total
        $total = $theory_avg + $practice_avg + $cooperative_avg;

        // Merge the calculated fields with the validated data
        $values = array_merge($validatedData, [
            'theory_avg' => $theory_avg,
            'practice_avg' => $practice_avg,
            'cooperative_avg' => $cooperative_avg,
            'total' => $total,
        ]);

        // Use updateOrCreate to create or update the record
        $classroomResult = ClassroomResult::updateOrCreate($attributes, $values);

        if ($classroomResult) {
            return back()->with('success', 'Successfully Stored a result');
        } else {
            return back()->with('error', 'Error storing a result');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
