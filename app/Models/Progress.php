<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Section;
use App\Models\Classroom;

class Progress extends Model
{
    use HasFactory;
    protected $fillable = [
        'classroom_id',
        'section_id',
        'score',
        'is_passed'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}