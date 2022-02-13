<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherContactStudent extends Model
{
    use HasFactory;
    protected $fillable = [
      
      
        'studentId',
        'teacherId',
        'message'
        
     ];
    
}
