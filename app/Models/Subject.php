<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'classroomId',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroomId');
    }

    public function subjectMaterial()
    {
        return $this->hasMany(SubjectMaterial::class, 'subjectId');
    }

    // public function assignment()
    // {
    //   return $this->hasMany(Assignment::class , 'id');
    // }
    // public function exam()
    // {
    //   return $this->hasMany(Exam::class , 'id');
    // }


    public function studentExam()
    {
        return $this->hasMany(StudentTakeExam::class, 'subjectId');
    }

    public function studentAssignment()
    {
        return $this->hasMany(StudentUploadAssignment::class, 'subjectId');
    }
    public function assignments()
    {
        return $this->belongsToMany('App\Models\Assignment', 'teacher_attaches_assignments', 'subjectId', 'assignmentId'); //'assignmentId', 'id', 'id', 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher', 'teacher_attaches_assignments', 'teacherId', 'subjectId', 'assignmentId', 'id', 'id', 'id');
    }


    //   public function teachers()
    //   {
    //     // return $this->belongsToMany('App\Models\Assignment','teacher_attaches_assignments','subjectId','assignmentId');//,'subjectId','id','id','id');


    //         return $this->belongsToMany('App\Models\Teacher','teacher_attaches_assignments','subjectId','teacherId');//,'id','id','id');
    //     } 

    //     public function classrooms()
    //     {
    //       return $this->belongsToMany('App\Models\Classroom','teacher_teaches_subjects','subjectId','classroomId');//,'teacherId','id','id','id');
    //   }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam', 'teacher_makes_exams', 'subjectId', 'examId'); //,'teacherId','id','id','id');
    }

    // public function teacherExam()
    // {


    //       return $this->belongsToMany('App\Models\Teacher','teacher_makes_exams','subjectId','teacherId');//,'id','id','id');
    //   } 
}
