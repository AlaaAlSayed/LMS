<?php

namespace App\Http\Controllers\Api;

use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\teacher_teaches_subjects;

class TeacherController extends Controller
{
  public function show($teacherId)
  {
    $teacher = Teacher::find($teacherId);
    return ($teacher);
  }
  public function home($teacherId)
  {
    $teacher = Teacher::find($teacherId);
    return   $teacher->classrooms->all();
  }

  public function index()
  {
    $teachers = Teacher::all();
    return ($teachers);
  }

  public function classroomSubject($teacherId, $classroomId)
  {
    $subjectId = teacher_teaches_subjects::where([['teacherId', '=', $teacherId], ['classroomId', '=', $classroomId]])->get('subjectId');
    return $subjectId;
  }


  public function store()
  {

    $data = request()->all();
    $teacher = Teacher::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'phone' => $data['phone'],
      'government' => $data['government'],
      'city' => $data['city'],
      'street' => $data['street'],
    ]);
    return ($teacher);
  }


  public function destroy($teacherId)
  {
    Teacher::where('id', $teacherId)->delete();
  }

  public function update(Request $request, $teacherId)
  {
    $teacher = Teacher::where('id', '=', $teacherId)->first();
    $teacher->update($request->all());
    return ($teacher);
  }
  // public function update($teacherId)
  // {
  //   $data = request()->all();
  //   //@dd( $data);
  //   $teacher = Teacher::where('id', $teacherId)->update([
  //     'name' => $data['name'],
  //     'email' => $data['email'],
  //     'phone' => $data['phone'],
  //     'government' => $data['government'],
  //     'city' => $data['city'],
  //     'street' => $data['street'],
  //   ]);

  //   // @dd( $data);
  //   return ($teacher);
  // }

}
