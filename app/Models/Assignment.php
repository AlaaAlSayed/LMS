<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    // public function assignmentUpload()
    // {
    //     return $this->hasMany(StudentUploadAssignment::class, 'id');
    // }
}
