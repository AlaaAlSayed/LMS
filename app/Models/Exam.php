<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // public function examResult()
    // {
    //     return $this->hasMany(StudentTakeExam::class, 'id');
    // }
    public function intakes()
    {
        return $this->hasMany(StudentTakeExam::class, 'examId');
    }
    
        
    
}
