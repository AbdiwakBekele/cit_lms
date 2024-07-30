<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomResult extends Model {
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'theory_l01',
        'theory_l02',
        'theory_l03',
        'theory_l04',
        'theory_avg',
        'practice_l01',
        'practice_l02',
        'practice_l03',
        'practice_l04',
        'practice_avg',
        'cooperative_l01',
        'cooperative_l02',
        'cooperative_l03',
        'cooperative_l04',
        'cooperative_avg',
        'total'
    ];
}
