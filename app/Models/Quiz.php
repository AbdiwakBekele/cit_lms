<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Content;
use App\Models\QuizOption;

class Quiz extends Model
{
    use HasFactory;


    protected $fillable = [
        'course_id',
        'content_id',
        'question',
        'answer',
        'type'
    ];

    public function quiz_options(){
       return $this->hasMany(QuizOption::class);
    }

    public function content(){
        return $this->belongsTo(Content::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}