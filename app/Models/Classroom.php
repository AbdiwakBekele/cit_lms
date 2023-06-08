<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
use App\Models\Course; 
use App\Models\Student; 
use App\Models\Progress;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'batch_id',
        'student_id',
        'working_in_the_field',
        'why_interested',
        'how_did_you_hear',
        'type_of_training',
        'additional_info',
        'payment_mode',
        'payment_type',
        'is_approved'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function progress(){
        return $this->hasMany(Progress::class);
    }
}