<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\Resource;
use App\Models\Section;

class Content extends Model
{
    use HasFactory;
    protected $fillable =[
        'section_id',
        'content_name',
        'content_description'
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
}