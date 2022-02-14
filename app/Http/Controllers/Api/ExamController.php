<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\StudentTakeExam;

use App\Http\Resources\ExamResource;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Requests\StoreExamRequest;
use App\Http\Resources\StudentTakeExamResource;

class ExamController extends Controller
{
    public function index()
    {
        $allExams = Exam::all();
        return  ExamResource::collection($allExams);
    }


    public function show($examId)
    {
        $exam = Exam::find($examId);
        return new ExamResource($exam);
    }

    public function store(StoreExamRequest $request)
    {
        $data = $request->all();

        $exam = Exam::create([
            'name' => $data['name'],
        ]);

        return new ExamResource($exam);
    }

    public function update($examId ,UpdateExamRequest $request)
    {

        $data = $request->all();

        $exam = Exam::where('id', $examId)->update([
            'name' => $data['name'],
        ]);

        $exam = Exam::find($examId);
        return new ExamResource($exam);
    }

    public function destroy($examId)
    {
        Exam::where('id', $examId)->delete();
        // $allExams = Exam::all();
        // return  ExamResource::collection($allExams);
    }


    public function take($examId ,$studentId,$subjectId)
    {

        $data = request()->all();
    
        StudentTakeExam::updateOrCreate(
            ['examId'=> $examId,'studentId'=> $studentId ,'subjectId'=> $subjectId],
            ['result'=>$data['result']]
        );

    }
}
