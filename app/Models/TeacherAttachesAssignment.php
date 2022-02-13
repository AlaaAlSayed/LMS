<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAttachesAssignment extends Model
{
    use HasFactory;
    protected $fillable = [
        //TeacherTeachesSubject	teacherId	subjectId	classId
        
          'subjectId',
          'teacherId',
          'assignmentId',
          'deadline',
         
          
       ];

       public function assignment()
   {
         return $this->hasMany(Assignment::class);
     }

}
