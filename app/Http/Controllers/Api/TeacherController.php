<?php

namespace App\Http\Controllers\Api;

use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\teacher_teaches_subjects;
use App\Models\User;
use App\Http\Requests\StoreTeacherRequest;

class TeacherController extends Controller
{
  public function show($teacherId)
  {
    $teacher =  User::join('teachers', 'teachers.id', '=', 'users.id')->find($teacherId);
    return $teacher;
  }

  public function showImage($teacherId)
  {
    $picture_path = Teacher::find($teacherId)->picture_path;
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
    $allTeachers =  User::join('teachers', 'teachers.id', '=', 'users.id')->get()->all();
    return  $allTeachers;
  }

  public function classroomSubject($teacherId, $classroomId)
  {
    $subjectId = teacher_teaches_subjects::where([['teacherId', '=', $teacherId], ['classroomId', '=', $classroomId]])->get('subjectId');
    return $subjectId;
  }


  public function store( )//StoreTeacherRequest  $request)
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

    $newUser = User::create([
      'username' => $data['username'],
      'name' => $data['name'],
      'password' => password_hash($data['password'], PASSWORD_DEFAULT),
      'roleId' => '2',
      'government' => $data['government'],
      'city' => $data['city'],
      'street' => $data['street'],
    ]);

    Teacher::create([
      'id' => $newUser->id,
      'phone' => $data['phone'],
      'email' => $data['email'],
      'picture_path' =>  $filename,

    ]);

    $allTeachers =  User::join('teachers', 'teachers.id', '=', 'users.id')->get()->all();
    return  $allTeachers;
  }


  public function destroy($teacherId)
  {
    $teacher =  User::join('teachers', 'teachers.id', '=', 'users.id')->find($teacherId);
    if ($teacher) {
      User::where('id', $teacherId)->delete();
      teacher_teaches_subjects::where('teacherId', $teacherId)->delete();

      $allStudents =  User::join('teachers', 'teachers.id', '=', 'users.id')->get()->all();
      return  $allStudents;
    }
    return  "not teacher";

    // Teacher::where('id', $teacherId)->delete();
  }

  public function update(Request $request, $teacherId)
  {
    // $teacher = Teacher::where('id', '=', $teacherId)->first();
    // $teacher->update($request->all());
    // return ($teacher);

    request()->validate([
      'picture_path' => 'image|mimes:jpeg,pmb,png,jpg|max:88453'
    ]);


    if (request()->hasFile('picture_path')) { //if user choose file
      $file = request()->file('picture_path'); //store  uploaded file to variable $file to
      $extension = $file->getClientOriginalExtension();
      $filename = 'teacher-image' . '_' . time() . '.' . $extension;
      $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
    } else {
      $filename =  Teacher::where('id', $teacherId)->get('picture_path');
    }

    $data = request()->all();


    User::where('id', $teacherId)->update([
      'username' => $data['username'],
      'name' => $data['name'],
      'password' => password_hash( $data['password'],PASSWORD_DEFAULT ),
      'government' => $data['government'],
      'city' => $data['city'],
      'street' => $data['street'],
    ]);

    Teacher::where('id', $teacherId)->update([
      'phone' => $data['phone'],
      'email' => $data['email'],
      'picture_path' =>  $filename,
    ]);
    
    $teacher =  User::join('teachers', 'teachers.id', '=', 'users.id')->find($teacherId);
    return $teacher;
  }

  public function assign() //$teacherId, $classroomId, $subjectId)
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


  public function teachesUpdate($teacherId, $subjectId)
  {
    $data = request()->all();
    $teacher = teacher_teaches_subjects::where([['teacherId', $teacherId], ['subjectId', $subjectId]])->update([
      // 'teacherId' => $data['teacherId'],
      // 'subjectId' => $data['subjectId'],
      'classroomId' => $data['classroomId'],
    ]);

    return ($teacher);
  }
  public function showClassroom($Id)
  {
    $teacher_teaches = teacher_teaches_subjects::find($Id);
    return response()->json($teacher_teaches);
  }
  // public function showClassroom($Id)
  // {
  //   $classroomId = teacher_teaches_subjects::find($Id);
  //   return ($classroomId);
  // }
}
