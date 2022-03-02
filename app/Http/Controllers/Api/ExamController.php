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
   
    public function index()
    {
        $allExams = Exam::all();
        return  ($allExams);
    }
    public function show($teacherId, $examId)
    {
        // $teacher= Teacher::find($teacherId);
        // return($teacher->exams);

        $exam=teacher_makes_exams::where([['teacherId',$teacherId],['examId',$examId]])->get();       
        return($exam);
    }

    public function teacherExams($teacherId)
    {
        $exams=teacher_makes_exams::where('teacherId',$teacherId)->get();       
        return($exams->all());
    }
  
    public function store($teacherId , $subjectId)
    {
        $data=request()->all();
            
        $exam= Exam::create([
           'name'=>$data['name']
        ]);
        
        teacher_makes_exams::create([
        'teacherId'=>$teacherId,
        'subjectId'=>$subjectId,
        'examId'=>$exam->id,
        'min_score'=>$data['min_score'],
        'time'=>$data['time'],
        'date'=>$data['date']
      ]);
      
        $teacher_makes_exams=teacher_makes_exams::all();
        return ($teacher_makes_exams);
    }

    public function update($examId)
    {
        $data=request()->all();
      
        Exam::where('id', $examId)->update([
           'name'=>$data['name']
       ]);
      
        teacher_makes_exams::where('examId', $examId)->update([
        'min_score'=>$data['min_score'],
        'time'=>$data['time'],
        'date'=>$data['date']
      ]);
    }

    public function destroy($examId)
    {
        Exam::where('id', $examId)->delete();
        teacher_makes_exams::where('examId', $examId)->delete();
        
        $teacher_makes_exams=teacher_makes_exams::all();
        return($teacher_makes_exams);
    }



    public function take($examId, $studentId, $subjectId)
    {
        $data = request()->all();
    
        StudentTakeExam::updateOrCreate(
            ['examId'=> $examId,
            'studentId'=> $studentId ,
            'subjectId'=> $subjectId],
            ['result'=>$data['result']
            ]);
    }
    
}






