<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Answer; 

class Match_Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'answer_id',
        'match_row_id',
        'match_column_id'
    ];

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}