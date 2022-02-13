<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name',
        'email',
        'phone' ,
    
        //address
        'government',
        'city',
        'street',
     
    ];


 public function subject()
     {
         return $this->hasMany(Subject::class);    
         }
}

