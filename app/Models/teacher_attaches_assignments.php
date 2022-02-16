<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_attaches_assignments extends Model
{
    use HasFactory;
    protected $fillable = [
      
        'subjectId',
        'teacherId',
        'assignmentId',
        'deadline',
        'updated_at',
        'updated_at'
      ];

    
}
