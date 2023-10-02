<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Content;
use App\Models\QuizOption;
use App\Models\Answer;
use App\Models\Match_Row;
use App\Models\Match_Column;

class Quiz extends Model
{
    use HasFactory;


    protected $fillable = [
        'course_id',
        'content_id',
        'question',
        'answer',
        'points',
        'type',
        'question_image'
    ];

    public function quiz_options(){
       return $this->hasMany(QuizOption::class);
    }

    public function answers(){
       return $this->hasMany(Answer::class);
    }

    public function match_rows(){
       return $this->hasMany(Match_Row::class);
    }

    public function match_columns(){
       return $this->hasMany(Match_Column::class);
    }

    public function content(){
        return $this->belongsTo(Content::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}