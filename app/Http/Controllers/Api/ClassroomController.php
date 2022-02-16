<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teacher_teaches_subjects;
use App\Models\Teacher;

class ClassroomController extends Controller
{
    public function show($teacherId)
{ 
    // @dd(  'ddddddddddddd');
    $teachers=Teacher::find($teacherId);
    return(  $teachers->classrooms);
  

}


}
