<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Scholarship extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fullname',
        'email',
        'age',
        'gender',
        'phone',
        'city',
        'subcity',
        'level_of_education',
        'work_status',
        'current_occupation',
        'work_experience',
        'course_id',
        'essay',
        'resume',
        'financial',
        'status'
    ];


    public function course(){
        return $this->belongsTo(Course::class);
    }
}