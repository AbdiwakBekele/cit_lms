<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Answer;
use App\Models\Match_Answer;

class AnswerController extends Controller
{

    public function index(): Response
    {
        //
    }


    public function create(): Response
    {
        //
    }

    public function quizAnswerSubmit(Request $request, $classroom_id, $quiz_id ){
        $answer = $request->input('answer');
        
        $user_answer = new Answer([
            'quiz_id'=>$quiz_id,
            'classroom_id'=>$classroom_id,
            'answer'=>$answer
        ]);
        
        if($user_answer->save()){
            return response()->json(['message' => 'Question Submitted Successfully']);
        }else{
            return response()->json(['message' => 'Error Submitting Answers']);
        }
    }

    public function quizMatchSubmit(Request $request, $classroom_id, $quiz_id ){
        
            $matchAnswersData = $request->input('match_answers');

            $user_answer = new Answer([
                'quiz_id'=>$quiz_id,
                'classroom_id'=>$classroom_id
            ]);

            if($user_answer->save()){
                
                $answer_id =  $user_answer->id;

                foreach ($matchAnswersData as $answerData) {
                    $rowId = $answerData['row_id'];
                    $columnId = $answerData['column_id'];

                    Match_Answer::create([
                        'answer_id'=> $answer_id,
                        'match_row_id' => $rowId,
                        'match_column_id' => $columnId,
                    ]);
                }

                return response()->json(['message' => 'Answer Successfully Submitted']);
            }else{

                return response()->json(['message' => 'Error Sending Message']);

            }


            
            
        
    }

    public function store(Request $request): RedirectResponse
    {
        //
    }

    public function show(string $id): Response
    {
        //
    }


    public function edit(string $id): Response
    {
        //
    }


    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }


    public function destroy(string $id): RedirectResponse
    {
        //
    }
}