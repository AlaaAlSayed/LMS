<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTakeExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentId',
        'subjectId',
        'examId',
        'result',
    ];

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
    // public function subject()
    // {
    //     return $this->belongsTo(Subject::class);
    // }
    // public function exam()
    // {
    //     return $this->belongsTo(Exam::class);
    // }

}
