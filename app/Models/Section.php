<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Progress;
use App\Models\Quiz;
use Illuminate\Support\Carbon;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'section_name',
        'sequence',
        'duration',
        'section_description'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function progress() {
        return $this->hasMany(Progress::class);
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }

}
    