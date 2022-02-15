<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name',
        'email',
        'phone' ,
    
        //address
        'government',
        'city',
        'street',
     
    ];


    public function assignments()
    {
          return $this->belongsToMany('App\Models\Assignment','teacher_attaches_assignments','teacherId','subjectId','assignmentId','id','id','id');
      }

      public function subjects()
      {
        return $this->belongsToMany('App\Models\Subject','teacher_attaches_assignments','teacherId','subjectId','assignmentId','id','id','id');
    }
    }
