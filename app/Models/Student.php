<?php

namespace App\Models;

use App\Http\Resources\AssignmentResource;
use App\Http\Resources\AssignmentUploadResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'picture_path',
        'classroomId',
        'government',
        'city',
        'street',
    ];
    public function classrooms()
        {
          return $this->belongsToMany('App\Models\Classroom','classroom','subjectId','classroomId');//,'teacherId','id','id','id');
      }
   

<<<<<<< HEAD

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'classroomId');
    }
    // public function messages()
    // {
    //     return $this->hasMany(AdminNotifyStudent::class, 'studentId');
    // }

    // public function subjectExam()
    // {
    //     return $this->hasMany(StudentTakeExam::class, 'id');
    // }
  
    // public function subjectAssignment()
    // {
    //     return $this->hasMany(StudentUploadAssignment::class, 'id');//works for data retrieval
    // }
  
  

    
    //********************************************************** */
    // public function transaction()
    // {
    //   return $this->hasMany(Transaction::class);
    // }


/////////////////
// public function transaction()
//     {
//         return $this->hasMany(Transaction::class);
//     }

// public function Admin()
//     {
//         return $this->belongsTo(Admin::class);
//     }
=======
>>>>>>> 627264b68300cef2c8baea40c4762f024f5c435f
}
