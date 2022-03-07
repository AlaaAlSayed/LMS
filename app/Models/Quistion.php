<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quistion extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'subjectId',
        'examId',
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjectId');
    }
    
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'examId');
    }
    
    public function option()
    {
        return $this->hasMany(Option::class, 'option');
    }
    

}
