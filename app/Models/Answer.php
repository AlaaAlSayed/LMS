<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'optionId',
        'studentId',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'studentId');

    }

    public function option()
    {
        return $this->belongsTo(Option::class, 'optionId');
    }
}
