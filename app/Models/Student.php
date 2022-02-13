<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone' ,
        'picture_path',
        'classroomId',
        'government',
        'city',
        'street',
    ];


      public function classroom()
    {
        return $this->belongsTo(Classroom::class ,'id' );
    }

    // public function transaction()
    // {
    //   return $this->hasMany(Transaction::class);
    // }

}
