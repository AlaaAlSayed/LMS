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

  public function showImage($teacherId)
  {
    $picture_path = Teacher::where('id', $teacherId)->first()->picture_path;
    $imgsrc = asset('storage/assets/' . $picture_path);
    return response()->json($imgsrc);
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
    request()->validate([
      'picture_path' => 'image|mimes:jpeg,pmb,png,jpg|max:88453'
    ]);


    if (request()->hasFile('picture_path')) //if user choose file
    {

      $file = request()->file('picture_path'); //store  uploaded file to variable $file to 

      $extension = $file->getClientOriginalExtension();
      $filename = 'teacher-image' . '_' . time() . '.' . $extension;
      $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file


    } else {

      $filename = 'image_tmp.jpeg';
    }

    $data = request()->all();
    $teacher = Teacher::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'phone' => $data['phone'],
      'picture_path' => $filename,
      'government' => $data['government'],
      'city' => $data['city'],
      'street' => $data['street'],
    ]);
    return ($teacher);
  }


  public function destroy($teacherId)
  {
    Teacher::where('id', $teacherId)->delete();
    teacher_teaches_subjects::where('teacherId', $teacherId)->delete();
  }

  public function update(Request $request, $teacherId)
  {
    $teacher = Teacher::where('id', '=', $teacherId)->first();
    $teacher->update($request->all());
    return ($teacher);
  }

  public function assign()//$teacherId, $classroomId, $subjectId)
  {
    $data = request()->all();

    $teacher = teacher_teaches_subjects::create([
      'teacherId' => $data['teacherId'],
      'subjectId' => $data['subjectId'],
      'classroomId' => $data['classroomId'],
    ]);

    return ($teacher);
  }


  public function teaches()
  {
    $teacher = teacher_teaches_subjects::all();
    return ($teacher);
  }


  public function teachesUpdate($teacherId,$subjectId)
  {
    $data = request()->all();
    $teacher = teacher_teaches_subjects::where([['teacherId', $teacherId],['subjectId',$subjectId]])->update([
      // 'teacherId' => $data['teacherId'],
      // 'subjectId' => $data['subjectId'],
      'classroomId' => $data['classroomId'],
    ]);

    return ($teacher);
  }

}
