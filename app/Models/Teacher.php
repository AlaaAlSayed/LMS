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
        return $this->belongsToMany('App\Models\Assignment', 'teacher_attaches_assignments', 'teacherId', 'assignmentId'); //,'assignmentId','id','id','id');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject', 'teacher_teaches_subjects', 'teacherId', 'subjectId');
    }
    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam', 'teacher_makes_exams', 'teacherId', 'examId');
    }
}
