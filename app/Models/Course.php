<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
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

    public function delete()
    {
        // Delete the associated file before deleting the model
        if (!empty($this->course_image)) {
            // Adjust the path to your specific directory structure
            $filePath = 'course_resources/' . $this->course_image;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }

        // Delete the model
        return parent::delete();
    }


}