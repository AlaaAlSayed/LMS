<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantFillApplication extends Model
{
    use HasFactory;
    protected $fillable = [
            // applicantId	adminId	applicationId	answer

        'applicantId',
        'adminId',
        'applicationId',
        'answer',
    ];
}
