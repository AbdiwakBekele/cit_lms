<?php

namespace App\Models;
use App\Models\Course;
use App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'content_id',
        'path'
    ];


    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function content(){
        return $this->belongsTo(Contnet::class);
    }
}