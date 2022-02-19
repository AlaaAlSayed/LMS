<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\StudentTakeExam;

use App\Http\Resources\ExamResource;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Requests\StoreExamRequest;
use App\Http\Resources\StudentTakeExamResource;
use Illuminate\Http\Request;
use App\Models\Assignment;

use App\Models\Teacher;
use App\Models\teacher_makes_exams;
use App\Models\Subject;



class ExamController extends Controller
{
    // public function index()
    // {
    //     $allExams = Exam::all();
    //     return  ExamResource::collection($allExams);
    // }


    // public function show($examId)
    // {
    //     $exam = Exam::find($examId);
    //     return new ExamResource($exam);
    // }

    // public function store(StoreExamRequest $request)
    // {
    //     $data = $request->all();

    //     $exam = Exam::create([
    //         'name' => $data['name'],
    //     ]);

    //     return new ExamResource($exam);
    // }

    // public function update($examId, UpdateExamRequest $request)
    // {
    //     $data = $request->all();

    //     $exam = Exam::where('id', $examId)->update([
    //         'name' => $data['name'],
    //     ]);

    //     $exam = Exam::find($examId);
    //     return new ExamResource($exam);
    // }

    // public function destroy($examId)
    // {
    //     Exam::where('id', $examId)->delete();
    //     // $allExams = Exam::all();
    //     // return  ExamResource::collection($allExams);
    // }


    // public function take($examId, $studentId, $subjectId)
    // {
    //     $data = request()->all();
    
    //     StudentTakeExam::updateOrCreate(
    //         ['examId'=> $examId,'studentId'=> $studentId ,'subjectId'=> $subjectId],
    //         ['result'=>$data['result']]
    //     );
    // }


    public function index($teacherId)
    {
        $teacher=Teacher::find($teacherId);
        // @dd(  $teachers->assignments);
       
        return($teacher->exams);
    }
  

    public function show($teacherId, $examId)
    {
        $teacher= Teacher::find($teacherId);
        //  $examId=$examId-1;
        return($teacher->exams[$examId]);
    }


    public function store($teacherId)
    {
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
        teacher_makes_exams::where('teacherId', $teacherId)->update([
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
    public function update($teacherId, $examId)
    {
        $data=request()->all();
        //    @dd( $data);
        $subject= Subject::find($teacherId);
        //  @dd( $subject->id);
      
        Exam::where('id', $examId)->update([
           'name'=>$data['name']
       ]);
      
        // @dd( $assignment->id);
        teacher_makes_exams::where('teacherId', $teacherId)->update([
        'min_score'=>$data['min_score'],
        'time'=>$data['time'],
        'date'=>$data['date']
      ]);
    }

    public function destroy($examId)
    {
        Exam::where('id', $examId)->delete();
        teacher_makes_exams::where('id', $examId)->delete();
        
        $teacher_makes_exams=teacher_makes_exams::all();
        return($teacher_makes_exams);
    }
}
// use Illuminate\Http\Request;
// use App\Models\Assignment;
// use App\Models\Exam;
// use App\Models\Teacher;
// use App\Models\teacher_makes_exams;
// use App\Models\Subject;

// class ExamController extends Controller
// {
//     public function index($teacherId)
//     {
//         $teacher=Teacher::find($teacherId);
//         // @dd(  $teachers->assignments);
       
//         return($teacher->exams);
//   }
  

//   public function show($teacherId,$examId)
//     { 
//         $teacher= Teacher::find($teacherId);
//       //  $examId=$examId-1;
//         return(  $teacher->exams[$examId]);
      
//     }


//     public function store($teacherId) {
  
//         $data=request()->all();
//      //    @dd( $data);
//         $subject= Subject::find($teacherId);
//        //  @dd( $subject->id);
     
//          $exam= Exam::create([
//            'name'=>$data['name']
//        ]); 
//       // @dd($data['min_score']);
//        // @dd( $assignment->id);
       
         
         
//        // @dd( $assignment->id);
//        teacher_makes_exams::where('teacherId',$teacherId)->update([
//         'teacherId'=>$teacherId,
//         'subjectId'=>$subject->id,
//         'examId'=>$exam->id,
//         'min_score'=>$data['min_score'],
//         'time'=>$data['time'],
//         'date'=>$data['date']
//       ]); 
      
//      $teacher_makes_exams=teacher_makes_exams::all();
//       return ($teacher_makes_exams);
       
     
//      }
//      public function update($teacherId,$examId) {
  
//         $data=request()->all();
//       //    @dd( $data);
//         $subject= Subject::find($teacherId);
//        //  @dd( $subject->id);
      
//          Exam::where('id',$examId)->update([
//            'name'=>$data['name']
//        ]); 
      
//        // @dd( $assignment->id);
//        teacher_makes_exams::where('teacherId',$teacherId)->update([
//         'min_score'=>$data['min_score'],
//         'time'=>$data['time'],
//         'date'=>$data['date']
//       ]); 
      
      
       
      
//       }

//     public function destroy($examId) {
  
//         Exam::where('id',$examId)->delete();
//         teacher_makes_exams::where('id',$examId)->delete();
        
//         $teacher_makes_exams=teacher_makes_exams::all();
//          return($teacher_makes_exams);
      
//       }
       
// }
