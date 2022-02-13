<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminContactsTeacher extends Model
{
    use HasFactory;


    protected $fillable = [
        'teacherId',
        'adminId',
        'message',
      
    ];
}
