<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classroom; 
use App\Models\Quiz; 
use App\Models\Match_Answer; 

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'classroom_id',
        'answer'
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function matchAnswers(){
        return $this->hasMany(Match_Answer::class);
    }
}