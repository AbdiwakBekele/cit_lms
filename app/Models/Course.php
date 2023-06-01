<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use App\Models\Batch;
use App\Models\User; 
use App\Models\CourseCategory;
use App\Models\Classroom;
use App\Models\Resource;
use App\Models\Quiz;
use Illuminate\Support\Facades\Storage;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_category_id',
        'course_name',
        'short_name',
        'course_image',
        'course_intro',
        'course_duration',
        'course_price',
        'description',
        'user_id'
    ];

    public function courseCategory(){
        return $this->belongsTo(CourseCategory::class);
    }

    public function sections(){
        return $this->hasMany(Section::class)->orderBy('sequence');
    }

    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }

    public function resources(){
        return $this->hasMany(Resource::class);
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }

    public function courseUser(){
        return $this->belongsTo(User::class);
    }

}