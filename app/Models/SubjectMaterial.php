<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
      
       'subjectId',
       'material',
    ];

    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }
    
}
