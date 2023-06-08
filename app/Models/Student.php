<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use App\Models\classrooms; 
use App\Models\StudentDocument; 

class Student extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;

    protected $fillable = [
        'fullname',
        'age',
        'gender',
        'email',
        'phone',

        'city',
        'subcity',
        'house_no',

        'facebook',
        'instagram',
        'linkedin',
        'tiktok',
        'twitter',

        'level_of_education',
        'work_status',
        'current_occupation',
        'work_experience',
        
        'profile_img',
        'is_approved',
        'password'
    ];

    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }

    public function studentDocuments(){
        return $this->hasMany(StudentDocument::class);
    }

}