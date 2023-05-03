<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

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

    public function classrooms(){
        return $this->hasMany('App\Models\Classroom');
    }

    public function courseCategory(){
        return $this->belongsTo('App\Models\CourseCategory');
    }

    public function courseUser(){
        return $this->belongsTo('App\Models\User');
    }

    public function sections(){
        return $this->hasMany(Section::class)->orderBy('sequence');
    }


}