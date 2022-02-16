<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
    ];

    public function teachers()
    {
      
        
          return $this->belongsToMany('App\Models\Teacher','teacher_attaches_assignments','assignmentId','teacherId');//,'subjectId','id','id','id');
      }      

      public function subjects()
      {
        return $this->belongsToMany('App\Models\Subject','teacher_attaches_assignments','assignmentId','subjectId');//,'teacherId','id','id','id');
    }

}
