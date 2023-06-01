<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Section;
use App\Models\Classroom;

class progress extends Model
{
    use HasFactory;
    protected $fillable = [
        'classroom_id',
        'section_id',
        'score',
        'is_passed'
    ];

    public function section(){
        $this->belongsTo(Section::class);
    }

    public function classroom(){
        $this->belongsTo(Classroom::class);
    }
}