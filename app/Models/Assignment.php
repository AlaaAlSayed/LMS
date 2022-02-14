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

    public function uploads()
    {
        return $this->hasMany(StudentUploadAssignment::class, 'assignmentId');
    }
}
