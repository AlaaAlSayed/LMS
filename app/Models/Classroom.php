<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;


 protected $fillable = [
    'level',
    'capacity',
    'time_table' ,
    
];

public function student()
{
    return $this->hasMany(Student::class,'classroomId');
}

public function subjects()
{
    return $this->hasMany(Subject::class);
}
}
