<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progress extends Model
{
    use HasFactory;
    protected $fillable = [
        'classroom_id',
        'section_id',
        'score',
        'is_passed'
    ];
}