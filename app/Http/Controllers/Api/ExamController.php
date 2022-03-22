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
use Symfony\Component\Console\Question\Question;
use App\Models\Quistion;
use App\Models\Option;
use App\Models\Answer;
use PhpParser\Node\Stmt\Return_;



class ExamController extends Controller
{
  public function show( $examId)
  {


    $options = [];
    $correctAnswers = [];
    // $exam = teacher_makes_exams::where([['teacherId', $teacherId], ['examId', $examId]])->get();
    $exam = teacher_makes_exams::where('examId', $examId)->get();

    //  DD( $exam[0]->examId);
    $quistions = Quistion::where('examId', $exam[0]->examId)->get('value');


    $quistionsId = Quistion::where('examId', $exam[0]->examId)->get('id');

    foreach ($quistionsId as   $quistionId) {

      $option = Option::where('quistionId', $quistionId->id)->get('value');
      array_push( $options, $option);
      $correctAnswer = Option::where('quistionId', $quistionId->id)->get('is_correct');
      array_push( $correctAnswers, $correctAnswer);
    }


        return (['quistions' => $quistions, 'options' => $options, 'correctAnswers' => $correctAnswers]);

  }


  public function store($teacherId, $subjectId)
  {
    $data = request()->all();
    $exam = Exam::create([
      'name' => $data['name'],
    ]);

    teacher_makes_exams::create([
      'teacherId' => $teacherId,
      'subjectId' => $subjectId,
      'examId' => $exam->id,
      'min_score' => $data['min_score'],
      'start' => $data['start'],
      'finish' => $data['finish'],
      'date' => $data['date']
    ]);
    // dd($exam->id);
    $teacher_makes_exams = teacher_makes_exams::where('examId', $exam->id)->get();
    $exam = Exam::where('id', $exam->id)->get();

    return (['teacher_makes_exams' => $teacher_makes_exams->first()->examId, 'exam_name' => $exam->first()->name]);
  }

  public function update($examId)
  {
    $data = request()->all();

    Exam::where('id', $examId)->update([
      'name' => $data['name'],

    ]);

    $teacher = teacher_makes_exams::where('examId', $examId)->update([
      'min_score' => $data['min_score'],
      'time' => $data['time'],
      'date' => $data['date']
    ]);

    return ($teacher);
  }

  public function destroy($examId)
  {
    Exam::where('id', $examId)->delete();
    teacher_makes_exams::where('examId', $examId)->delete();

    $teacher_makes_exams = teacher_makes_exams::all();
    return ($teacher_makes_exams);
  }

  public function score($examId, $studentId )
    {
  
      $result=request()->get('result');
      $subjectId = Quistion::where('examId', $examId)->get();

    

              $is_exist= StudentTakeExam::where(
                  [
                    'examId' => $examId,
                    'studentId' => $studentId,
                    'subjectId' => $subjectId->first()->subjectId,
                    
                  ])->get();
            
                  if($is_exist->first()!= null)                  {
                    StudentTakeExam::where(
                      [
                        'examId' => $examId,
                        'studentId' => $studentId,
                        'subjectId' => $subjectId->first()->subjectId,
                        
                      ])->update([
                        'result' => $result,
                      ]);
                
                  }

                else {
                  StudentTakeExam::UpdateOrCreate(
                    [
                      'examId' => $examId,
                      'studentId' => $studentId,
                      'subjectId' => $subjectId->first()->subjectId,
                      'result' => $result,
                    ]);
                  }
    }

//   public function score($examId, $studentId )
//   {

//     $selectedOptions=request()->get('selectedOptions');

//     $subjectId = Quistion::where('examId', $examId)->get();
//     $selectedOptions = trim($selectedOptions, '[');
//     $selectedOptions = trim($selectedOptions, ']');
//     $selectedOptionsArray =   explode(',', $selectedOptions);


//     $studentResult = 0;
//     foreach ($selectedOptionsArray as $selectedOption) {
//       $isCorrect = Option::where('id', (int)$selectedOption)->get('is_correct');

//       if ($isCorrect->first()->is_correct == 1) {
//         $studentResult++;
//       }
//     }

//  $is_exist= StudentTakeExam::where(
//   [
//     'examId' => $examId,
//     'studentId' => $studentId,
//     'subjectId' => $subjectId->first()->subjectId,
    
//   ])->get();

//   if($is_exist->first()!= null)
//   {
//     StudentTakeExam::where(
//       [
//         'examId' => $examId,
//         'studentId' => $studentId,
//         'subjectId' => $subjectId->first()->subjectId,
//       ]
//     )->delete();
//   }
// else {
//     StudentTakeExam::Create(
//       [
//         'examId' => $examId,
//         'studentId' => $studentId,
//         'subjectId' => $subjectId->first()->subjectId,
//         'result' => $studentResult,
//       ]
//     );
//   }
//     $total= Quistion::where('examId', $examId)->get();
//     return [$studentResult,count($total)];
//   }


  public function  subjectExams($subjectId){
    
    // $subject= Subject::find($subjectId)->first();
    // return  $subject->exams ;
    $allExams= teacher_makes_exams::join('exams', 'exams.id', '=', 'teacher_makes_exams.examId')->where('subjectId',$subjectId)->get()->all();
    return   $allExams ;

  }


  public function  getExamName($examId){
    
    // $subject= Subject::find($subjectId)->first();
    // return  $subject->exams ;
    $examName = teacher_makes_exams::where('examId', $examId)->get();    
    return   $examName ;

  }
}
