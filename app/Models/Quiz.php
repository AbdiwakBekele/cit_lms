<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Section;
use App\Models\QuizOption;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'section_id',
        'question',
        'answer'
    ];

    public function quiz_options(){
        $this->hasMany(QuizOption::class);
    }

    public function section(){
        $this->belongsTo(Section::class);
    }

    public function course(){
        $this->belongsTo(Course::class);
    }
}