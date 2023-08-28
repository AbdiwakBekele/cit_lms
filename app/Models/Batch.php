<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course; 
use App\Models\Classroom; 
use App\Models\BatchContent; 

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'batch_name',
        'shift',
        'starting_date',
        'ending_date',
        'description',
        'status'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }

    public function batchContents(){
        return $this->hasMany(BatchContent::class);
    }
    
}