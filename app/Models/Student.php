<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use App\Models\classrooms; 

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
        'address',
        'profile_img',
        'is_approved',
        'password'
    ];

    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }

}