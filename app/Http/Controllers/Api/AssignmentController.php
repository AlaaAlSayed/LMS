<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Teacher;
use App\Models\teacher_attaches_assignments;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;
use Spatie\FlareClient\Http\Response;
use App\Http\Resources\AssignmentResource;

class AssignmentController extends Controller
{
  public function index()
  {
    $allAssignments = Assignment::all();
    return   $allAssignments->all();
  }

  // public function show($teacherId, $assignmentId)
  // {
  //   $teacher = Teacher::find($teacherId);
  //   // @dd($teacher->assignments);
  //   // return View('assignment'); 
  //   // return View('assignment', ['assignmentId' => $assignmentId]);

  //   return View('assignment', ['assignment_pdf' => $teacher->assignments->find($assignmentId)->name]);
  // }

  public function studentshow($assignmentId)
  {
    $assignment = Assignment::find($assignmentId);
    $embed_src= asset('storage/assets/'. $assignment->name);
    return response()->json($embed_src);
  }

  public function download($assignmentId)
  {
    $assignment = Assignment::find($assignmentId);
    return response()->download('storage/assets/' . $assignment->name);
  }

  public function teacherAssignments($teacherId)
  {
    $allTeacherAssignments = teacher_attaches_assignments::where('teacherId','=',$teacherId)->get();
    return ($allTeacherAssignments);
  }

  public function store($teacherId,$subjectId ,Request $request)
  {
    $request->validate([
      "name" => 'required|mimes:pdf,docs,xlsx|max:10000'
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
    // $subject = Subject::find($teacherId);
    $assignment = Assignment::create([
      'name' => $filename
    ]);

    $teacher_teaches_subjects = teacher_attaches_assignments::create([
      'teacherId' => $teacherId,
      'subjectId' => $subjectId,
      'assignmentId' => $assignment->id,
      'deadline' => $data['deadline']
    ]);
    $teacher_teaches_subjects = teacher_attaches_assignments::all();
    return ($teacher_teaches_subjects);

  }

  public function update( $assignmentId)
  {
    request()->validate([
      "name" => 'required|mimes:pdf,docs,xlsx|max:10000'
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
}
