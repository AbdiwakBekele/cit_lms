<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Progress;
use Illuminate\Support\Carbon;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'section_name',
        'sequence',
        'duration',
        'section_description'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function progress() {
        return $this->hasMany(Progress::class);
    }

}
    