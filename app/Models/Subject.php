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
        return $this->belongsToMany('App\Models\Assignment', 'teacher_attaches_assignments', 'teacherId', 'subjectId', 'assignmentId', 'id', 'id', 'id');
    }

    public function teachers()
    {


        return $this->belongsToMany('App\Models\Teacher', 'teacher_attaches_assignments', 'teacherId', 'subjectId', 'assignmentId', 'id', 'id', 'id');
    }
}
