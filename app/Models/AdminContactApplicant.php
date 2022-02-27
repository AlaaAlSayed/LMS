<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminContactApplicant extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicantId',
        'adminId',
        'message',
    ];
}
