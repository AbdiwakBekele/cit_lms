<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch; 
use App\Models\Content; 

class BatchContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'batch_id',
        'content_id'
        
    ];

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function content(){
        return $this->belongsTo(Content::class);
    }

    
}