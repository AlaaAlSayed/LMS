<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Teacher;
use App\Models\teacher_attaches_assignments;
use App\Models\Subject;


class AssignmentController extends Controller
{
    public function show($teacherId,$assignmentId)
    { 
        $teacher= Teacher::find($teacherId);
        return($teacher->assignments[$assignmentId]);
      
    }

    public function index($teacherId)
  {
      $teachers=Teacher::find($teacherId);
      // @dd(  $teachers->assignments);
      // select('first_name','pic')->get();
      return($teachers->assignments);
}

 








//     public function index($teacherId)
//   {
//       $teachers=teacher_attaches_assignments::where('teacherId',$teacherId)->get();
//       // @dd(  $teachers);
//  return($teachers);
// }



  public function store($teacherId) {
  
   $data=request()->all();
//    @dd( $data);
   $subject= Subject::find($teacherId);
  //  @dd( $subject->id);

    $assignment= Assignment::create([
      'name'=>$data['name']
  ]); 

  // @dd( $assignment->id);
  $teacher_teaches_subjects=teacher_attaches_assignments::create([
    'teacherId'=>$teacherId,
    'subjectId'=>$subject->id,
    'assignmentId'=>$assignment->id,
    'deadline'=>$data['deadline']
]); 
$teacher_teaches_subjects=teacher_attaches_assignments::all();
 return ($teacher_teaches_subjects);
  

}


public function update($teacherId,$assignmentId) {
  
  $data=request()->all();
//    @dd( $data);
  $subject= Subject::find($teacherId);
 //  @dd( $subject->id);

   Assignment::where('id',$assignmentId)->update([
     'name'=>$data['name']
 ]); 

 // @dd( $assignment->id);
 $teacher_teaches_subjects=teacher_attaches_assignments::where('teacherId',$teacherId)->update([
   'deadline'=>$data['deadline']
]); 

return ($teacher_teaches_subjects);
 

}
// public function ($a){
//   $data=request()->all();
//   //@dd( $data);
//     $teacher= Assignment::where('id',$teacherId)->update([
//          'name'=>$data['name'],
//      ]); 
    
//     // @dd( $data);
//      return($teacher);
 
//   }

public function destroy($assignmentId) {
  
   Assignment::where('id',$assignmentId)->delete();
   teacher_attaches_assignments::where('id',$assignmentId)->delete();
   
   $teacher_teaches_subjects=teacher_attaches_assignments::all();
    return($teacher_teaches_subjects);
 
 }
  
}
