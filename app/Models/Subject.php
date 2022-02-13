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
        return $this->belongsTo(Classroom::class,'id');
    }


    public function subjectMaterial()
    {
      return $this->hasMany(SubjectMaterial::class , 'subjectId');
    } 
    public function assignment()
    {
      return $this->hasMany(Assignment::class , 'id');
    }
    public function exam()
    {
      return $this->hasMany(Exam::class , 'id');
    }

    
    public function examResult()
    {
        return $this->hasMany(StudentTakeExam::class, 'id');
    }
    
    public function assignmentUpload()
    {
        return $this->hasMany(AssignmentUploadResource::class, 'id');
    }
}
