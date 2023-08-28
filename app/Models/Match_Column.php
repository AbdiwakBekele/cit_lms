<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match_Column extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'column_content'
    ];
}