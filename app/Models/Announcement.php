<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'media',
        'adminID',
    ];


    public function admin()
    {
        return $this->belongsTo(User::class);
    }

    // public function sluggable():array
    // {
    //    return[ 'slug'=>['source'=>'title']];
    // }
}
