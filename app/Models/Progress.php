<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Content;
use App\Models\Classroom;

class Progress extends Model
{
    use HasFactory;
    protected $fillable = [
        'classroom_id',
        'content_id',
        'has_taken',
        'score',
        'is_passed'
    ];

    public function content(){
        return $this->belongsTo(Content::class);
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}