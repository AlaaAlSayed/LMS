<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

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
    // public function quistions()
    // {
    //     return $this->hasMany(Quistion::class, 'quistionId');
    // }
    
        
  
    public function teachers()
    {
      
        
          return $this->belongsTo('App\Models\Teacher','teacher_makes_exams','examId','teacherId');//,'subjectId','id','id','id');
      }      

      public function subjects()
      {
        return $this->belongsTo('App\Models\Subject','teacher_makes_exams','examId','subjectId');//,'teacherId','id','id','id');
    }

}
