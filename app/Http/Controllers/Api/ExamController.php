<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Exam;
use App\Models\Teacher;
use App\Models\teacher_makes_exams;
use App\Models\Subject;

class ExamController extends Controller
{
    public function index($teacherId)
    {
        $teacher=Teacher::find($teacherId);
        // @dd(  $teachers->assignments);
       
        return($teacher->exams);
  }
  

  public function show($teacherId,$examId)
    { 
        $teacher= Teacher::find($teacherId);
      //  $examId=$examId-1;
        return(  $teacher->exams[$examId]);
      
    }


    public function store($teacherId) {
  
        $data=request()->all();
     //    @dd( $data);
        $subject= Subject::find($teacherId);
       //  @dd( $subject->id);
     
         $exam= Exam::create([
           'name'=>$data['name']
       ]); 
      // @dd($data['min_score']);
       // @dd( $assignment->id);
       
         
         
       // @dd( $assignment->id);
       teacher_makes_exams::where('teacherId',$teacherId)->update([
        'teacherId'=>$teacherId,
        'subjectId'=>$subject->id,
        'examId'=>$exam->id,
        'min_score'=>$data['min_score'],
        'time'=>$data['time'],
        'date'=>$data['date']
      ]); 
      
     $teacher_makes_exams=teacher_makes_exams::all();
      return ($teacher_makes_exams);
       
     
     }
     public function update($teacherId,$examId) {
  
        $data=request()->all();
      //    @dd( $data);
        $subject= Subject::find($teacherId);
       //  @dd( $subject->id);
      
         Exam::where('id',$examId)->update([
           'name'=>$data['name']
       ]); 
      
       // @dd( $assignment->id);
       teacher_makes_exams::where('teacherId',$teacherId)->update([
        'min_score'=>$data['min_score'],
        'time'=>$data['time'],
        'date'=>$data['date']
      ]); 
      
      
       
      
      }

    public function destroy($examId) {
  
        Exam::where('id',$examId)->delete();
        teacher_makes_exams::where('id',$examId)->delete();
        
        $teacher_makes_exams=teacher_makes_exams::all();
         return($teacher_makes_exams);
      
      }
       
}
