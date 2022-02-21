<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // public function examResult()
    // {
    //     return $this->hasMany(StudentTakeExam::class, 'id');
    // }
    public function intakes()
    {
        return $this->hasMany(StudentTakeExam::class, 'examId');
    }
    
        
    
    public function teachers()
    {
      
        
          return $this->belongsToMany('App\Models\Teacher','teacher_makes_exams','examId','teacherId');//,'subjectId','id','id','id');
      }      

      public function subjects()
      {
        return $this->belongsToMany('App\Models\Subject','teacher_makes_exams','examtId','subjectId');//,'teacherId','id','id','id');
    }

}
