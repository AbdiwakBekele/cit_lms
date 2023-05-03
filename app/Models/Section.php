<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
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

    public function isAvailableForBatch($batch_start_date): bool
{
    $sections = $this->course->sections()->orderBy('sequence')->get();
    $start_date = Carbon::parse($batch_start_date);
    
    foreach ($sections as $section) {
        if ($section->id == $this->id) {
            // this is the section we're checking
            $end_date = $start_date->addDays($section->duration);
            return now()->between($start_date, $end_date);
        } else {
            // calculate the end date of the previous section
            $start_date->addDays($section->duration);
        }
    }

    return false;
}

    public function scopeOrdered($query)
    {
        return $query->orderBy('sequence');
    }
}
    