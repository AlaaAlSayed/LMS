<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\StudentUploadAssignment;

use App\Http\Resources\AssignmentResource;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Resources\StudentUploadAssignmentResource;

class AssignmentController extends Controller
{
    public function index()
    {
        $allAssignments = Assignment::all();
        return  AssignmentResource::collection($allAssignments);
    }


    public function show($assignmentId)
    {
        $assignment = Assignment::find($assignmentId);
        return new AssignmentResource($assignment);
    }

    public function store(StoreAssignmentRequest $request)
    {
        $data = $request->all();

        $assignment = Assignment::create([
            'name' => $data['name'],
        ]);

        return new AssignmentResource($assignment);
    }

    public function update($assignmentId ,UpdateAssignmentRequest $request)
    {

        $data = $request->all();

        $assignment = Assignment::where('id', $assignmentId)->update([
            'name' => $data['name'],
        ]);

        $assignment = Assignment::find($assignmentId);
        return new AssignmentResource($assignment);
    }

    public function destroy($assignmentId)
    {
        Assignment::where('id', $assignmentId)->delete();
        // $allAssignments = Assignment::all();
        // return  AssignmentResource::collection($allAssignments);
    }


    public function upload($assignmentId ,$studentId,$subjectId)
    {

        $data = request()->all();
        // StudentUploadAssignment::where('assignmentId', $assignmentId)
        // ->where('studentId', $studentId)
        // ->where('subjectId', $subjectId)
        // ->update([
            
        //     'answer'=>$data['answer'],
        // ]);

        StudentUploadAssignment::updateOrCreate(
            ['assignmentId'=> $assignmentId,'studentId'=> $studentId ,'subjectId'=> $subjectId],
            ['answer'=>$data['answer']]
        );

    }
    
}
