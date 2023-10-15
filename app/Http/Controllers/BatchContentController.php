<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\BatchContent;

class BatchContentController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $content_id = $request->input('content_id');
        $batch_id = $request->input('batch_id');
        $content_status = '1';

        // Store content_id and batch_id in batch_content model
        $batchContent = new BatchContent([
            'content_id' => $content_id,
            'batch_id' => $batch_id,
        ]);

        $batchContent = BatchContent::updateOrCreate(
            [
                'content_id' => $content_id,
                'batch_id' => $batch_id,
            ],
            ['content_status'=>$content_status]
        );

        if($batchContent){
            return response()->json(['message' => '<p class="alert alert-success" >Content Activated Successfully</p>']);
        }else{
            return response()->json(['message' => '<p class="alert alert-danger" >Unable to Activate</p>']);
        }
    }

    public function dismissContent(Request $request){
        $content_id = $request->input('content_id');
        $batch_id = $request->input('batch_id');

        // Deleting Content from Batch
        $batchContent = BatchContent::where('batch_id', $batch_id)->where('content_id', $content_id)->first();
        $batchContent->content_status = '0';
        if($batchContent->save()){
            return response()->json(['message' => '<p class="alert alert-success" >Content Deactivated Successfully</p>']);
        }else{
            return response()->json(['message' => '<p class="alert alert-danger" >Error Deactivating Content</p>']);
        }
        
    }

    public function activateQuiz(Request $request){
        $content_id = $request->input('content_id');
        $batch_id = $request->input('batch_id');

        // Deleting Content from Batch
        $batchContent = BatchContent::where('batch_id', $batch_id)->where('content_id', $content_id)->first();
        $batchContent->quiz_status = '1';
        if($batchContent->save()){
            return response()->json(['message' => '<p class="alert alert-success" >Content Quiz Activated Successfully</p>']);
        }else{
            return response()->json(['message' => '<p class="alert alert-danger" >Error Activating Content Quiz</p>']);
        }
    }

    public function dismissQuiz(Request $request){
        $content_id = $request->input('content_id');
        $batch_id = $request->input('batch_id');

        // Deleting Content from Batch
        $batchContent = BatchContent::where('batch_id', $batch_id)->where('content_id', $content_id)->first();
        $batchContent->quiz_status = '0';
        if($batchContent->save()){
            return response()->json(['message' => '<p class="alert alert-success" >Content Quiz Deactivated Successfully</p>']);
        }else{
            return response()->json(['message' => '<p class="alert alert-danger" >Error Deactivating Content Quiz</p>']);
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