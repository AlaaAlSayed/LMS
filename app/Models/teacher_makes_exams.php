<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_makes_exams extends Model
{
    use HasFactory;
    protected $fillable = [
      
        
        'teacherId',
        'subjectId',
        'examId',
        'min_score',
        'time',
        'date',
        
     ];
 
}
