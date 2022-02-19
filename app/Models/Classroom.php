<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;


 protected $fillable = [
    'level',
    'capacity',
    'code',
    'time_table' ,
    
];

public function student()
{
    return $this->hasMany(Student::class,'classroomId');
}

// public function students()
public function teachers()
{
  
    
      return $this->belongsToMany('App\Models\Teacher','teacher_teaches_subjects','classroomId','teacherId');//,'subjectId','id','id','id');
  }      

  public function subjects()
  {
    return $this->belongsToMany('App\Models\Subject','teacher_teaches_subjects','classroomId','subjectId');//,'teacherId','id','id','id');
}
}
