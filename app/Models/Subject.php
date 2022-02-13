<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'classroomId',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subjectMaterials()
    {
      return $this->hasMany(SubjectMaterial::class);
    }

}
