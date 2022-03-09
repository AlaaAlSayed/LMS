<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'is_correct',
        'quistionId',
    ];
    public function quistion()
    {
        return $this->belongsTo(Quistion::class, 'quistionId');
    }
    
}
