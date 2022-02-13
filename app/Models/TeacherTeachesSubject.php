<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherTeachesSubject extends Model
{
    use HasFactory;
    protected $fillable = [
      //TeacherTeachesSubject	teacherId	subjectId	classId
      
        'subjectId',
        'teacherId',
        'classroomId'
        
     ];
}
