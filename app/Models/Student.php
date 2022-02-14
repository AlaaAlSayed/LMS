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


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class, 'id');
    }


    public function subjectExam()
    {
        return $this->hasMany(StudentTakeExam::class, 'id');
    }
  
    public function subjectAssignment()
    {
        return $this->hasMany(StudentUploadAssignment::class, 'id');
    }
  
    
    //********************************************************** */
    // public function transaction()
    // {
    //   return $this->hasMany(Transaction::class);
    // }

}
