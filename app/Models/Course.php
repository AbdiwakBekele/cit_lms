<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_category_id',
        'course_name',
        'short_name',
        'course_image',
        'description',
        'user_id'
    ];


}
