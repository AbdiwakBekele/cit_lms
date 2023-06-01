<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable =[
        'section_id',
        'content_name',
        'content_description'
    ];

    public function resources(){
        return $this->hasMany(Resource::class);
    }
}