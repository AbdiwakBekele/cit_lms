<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'shift',
        'starting_date',
        'ending_date',
        'description',
        'status'
    ];
}