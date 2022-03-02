<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentUploadAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentId',
        'subjectId',
        'assignmentId',
        'answer',
    ];

    // public function student()
    // {
    //     return $this->belongsTo(Student::class,'id');
    // }
    // public function subject()
    // {
    //     return $this->belongsTo(Subject::class,'id');
    // }
    // public function assignment()
    // {
    //     return $this->belongsTo(Assignment::class,'id');
    // }

}
