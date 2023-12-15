<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\Resource;
use App\Models\Section;
use App\Models\Progress;
use App\Models\BatchContent;
use App\Models\Classroom;

class Content extends Model
{
    use HasFactory;
    protected $fillable =[
        'section_id',
        'content_name',
        'content_description',
        'content_reference'
    ];

    public function resources(){
        return $this->hasMany(Resource::class);
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function progress(){
        return $this->hasMany(Progress::class);
    }

    public function batchContents(){
        return $this->hasMany(BatchContent::class);
    }

    public function classrooms(){
        return $this->belongsToMany(Classroom::class, 'progress');
    }
}