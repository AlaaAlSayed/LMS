<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherMakesExam extends Model
{    //TeacherMakeExam	teacherId	subjectId	examId	time	date	min_score

    use HasFactory;
    protected $fillable = [
        //TeacherTeachesSubject	teacherId	subjectId	classId
        
          'subjectId',
          'teacherId',
          'examId',
          'time',
          'date',
          'min_score'
          
       ];
}
