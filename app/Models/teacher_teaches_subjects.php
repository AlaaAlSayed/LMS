<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_teaches_subjects extends Model
{
    use HasFactory;
    protected $fillable = [
      
        
        'teacherId',
        'subjectId',
        'classroomId',
        
     ];
 
    
}
