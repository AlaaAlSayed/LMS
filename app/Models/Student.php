<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone' ,
        'level',
        'picture_path',


        'classroomId',

        //address
        'government',
        'city',
        'street',
     
    ];
    public function classrooms()
        {
          return $this->belongsToMany('App\Models\Classroom','classroom','subjectId','classroomId');//,'teacherId','id','id','id');
      }
   

}
