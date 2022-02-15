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

    public function assignments()
    {
          return $this->belongsToMany('App\Models\Assignment','teacher_attaches_assignments','teacherId','subjectId','assignmentId','id','id','id');
      }

      public function teachers()
      {
        
          
            return $this->belongsToMany('App\Models\Teacher','teacher_attaches_assignments','teacherId','subjectId','assignmentId','id','id','id');
        }  
}
