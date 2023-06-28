<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Classroom;

class FinalProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'course_id',
        'score',
        'is_passed'
    ];

    public function course(){
        $this->belongsTo(Course::class);
    }

    public function classroom(){
        $this->belongsTo(Classroom::class);
    }

}