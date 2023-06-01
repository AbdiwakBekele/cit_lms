<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class QuizOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'option'
    ];

    public function quiz(){
        $this->belongsTo(Quiz::class);
    }
}