<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_name',
        'role_detail'
    ];

    public function role(){
        return $this->hasMany('App\Models\User');
    }
}
