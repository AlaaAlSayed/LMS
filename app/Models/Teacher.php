<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',

        //address
        'government',
        'city',
        'street',

    ];


    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment', 'teacher_attaches_assignments', 'teacherId', 'assignmentId'); //,'subjectId','id','id','id');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject', 'teacher_attaches_assignments', 'teacherId', 'subjectId'); //,'assignmentId','id','id','id');
    }

    public function classrooms()
    {
        return $this->belongsToMany('App\Models\Classroom', 'teacher_teaches_subjects', 'teacherId', 'classroomId'); //,'teacherId','id','id','id');
    }



    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam', 'teacher_makes_exams', 'teacherId', 'examId'); //,'teacherId','id','id','id');
    }
    public function subjectExam()
    {
        return $this->belongsToMany('App\Models\Subject', 'teacher_makes_exams', 'teacherId', 'subjectId'); //,'assignmentId','id','id','id');
    }
}
