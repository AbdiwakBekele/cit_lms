<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student; 

class StudentDocument extends Model{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'document_name',
        'document_path'
    ];

    public function student(){
        $this->belongsTo(Student::class);
    }
}