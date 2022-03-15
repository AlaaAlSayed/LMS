<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Teacher;
use App\Models\teacher_attaches_assignments;
use App\Models\StudentUploadAssignment;
use Illuminate\Support\Facades\Storage;
use Spatie\FlareClient\Http\Response;
use App\Http\Resources\AssignmentResource;
use App\Models\Subject;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MaterialUploaded;
use App\Models\Student;

class AssignmentController extends Controller
{
  
  public function index()
  {
    $allAssignments = Assignment::all();
    return   $allAssignments->all();
  }
  public function show($assignmentId)
  {
    $assignment = teacher_attaches_assignments::join('assignments','assignments.id', '=','teacher_attaches_assignments.assignmentId')->find($assignmentId);
    // $assignment = Assignment::find($assignmentId);
    return ($assignment); 

  }

  public function studentshow($assignmentId)
  {
    $assignment = Assignment::find($assignmentId);
    $embed_src = asset('storage/assets/' . $assignment->name);
    return response()->json($embed_src);
  }

  public function download($assignmentId)
  {
    $assignment = Assignment::find($assignmentId);
    return response()->download('storage/assets/' . $assignment->name);
  }

  public function teacherAssignments($teacherId)
  {
    $allTeacherAssignments = teacher_attaches_assignments::where('teacherId', '=', $teacherId)->get();
    return ($allTeacherAssignments);
  }
  public function getFile($assignmentId)
  {
    $assignment = Assignment::find($assignmentId);
    return response()->file('storage/assets/' . $assignment->name);
  }

  public function store($teacherId, $subjectId, Request $request)
  {
    $request->validate([
      'name' => 'mimes:pdf,docs,xlsx|max:10000'
    ]);

    if ($request->hasFile('name')) //if user choose file
    {

      $file = $request->file('name'); //store  uploaded file to variable $file to 
      $extension = $file->getClientOriginalExtension();
      $filename = 'Assignment' . '_' . time() . '.' . $extension;
      $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file

    } else {

      $filename = 'storage/app/public/assets/Assignment_tmp.pdf';
    }

    $data = request()->all();

    $assignment = Assignment::create([
      'name' => $filename
    ]);

    $teacher_teaches_subjects = teacher_attaches_assignments::create([
      'teacherId' => $teacherId,
      'subjectId' => $subjectId,
      'assignmentId' => $assignment->id,
      'deadline' => $data['deadline']
    ]);

    $subject=Subject::find ($subjectId);
    $students=Student::where('classroomId',$subject->classroomId)->get()->all();
    Notification::send($students, new MaterialUploaded( "assignment",$data['name'] , $subject->name )); //one to many
    
  
    $teacher_teaches_subjects = teacher_attaches_assignments::all();
    return ($teacher_teaches_subjects);
  }

  public function update($assignmentId)
  {
    request()->validate([
      'name' => 'mimes:pdf,docs,xlsx|max:10000'
    ]);

    if (request()->hasFile('name')) //if user choose file
    {

      $file = request()->file('name'); //store  uploaded file to variable $file to 
      $extension = $file->getClientOriginalExtension();
      $filename = 'Assignment' . '_' . time() . '.' . $extension;
      $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file

    } else {

      $filename = Assignment::where('id', $assignmentId)->name;
    }

    $data = request()->all();
    Assignment::where('id', $assignmentId)->update([
      'name' => $filename
    ]);

    $teacher_teaches_subjects = teacher_attaches_assignments::where('assignmentId', $assignmentId)->update([
      'deadline' => $data['deadline']
    ]);

    $teacher_teaches_subjects = teacher_attaches_assignments::all();
    return ($teacher_teaches_subjects);
  }


  public function destroy($assignmentId)
  {

    Assignment::where('id', $assignmentId)->delete();
    teacher_attaches_assignments::where('id', $assignmentId)->delete();

    $teacher_teaches_subjects = teacher_attaches_assignments::all();
    return ($teacher_teaches_subjects);
  }


  public function studentsUploads()
  {
    $allAssignments = StudentUploadAssignment::all();
    return   $allAssignments->all();
  }

  public function showAssignment($subjectId)
  {
    // $allAssignments = teacher_attaches_assignments::join('assignments','assignments.id', '=','teacher_attaches_assignments.assignmentId')->where('subjectId',$subjectId)->get();
    // return ($allAssignments); 
    return response()//->json($allAssignments) 
    ->header('Accept','application/json')
    ->header('Access-Control-Allow-Origin ','http://127.0.0.1:*')
    ->header('Access-Control-Allow-Methods','GET')
    ->header('Access-Control-Allow-Headers','Content-Type, Authorization')
    ->header('Access-Control-Allow-Credentials','true')

    ;
  }

  
}
