<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Classroom;
use App\Http\Resources\SubjectResource;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Requests\StoreSubjectRequest;

class SubjectController extends Controller
{
    public function index()
    {
        $allSubjects = Subject::all();
        return  $allSubjects->all(); 
    }


    public function show($subjectId)
    {
        $subject = Subject::find($subjectId);
        return new SubjectResource($subject);
    }

    public function store(StoreSubjectRequest $request)
    {
        $data = request()->all();

        $subject = Subject::create([
            'name' => $data['name'],
            'classroomId' => $data['classroomId'],
        ]);

        return ($subject);
    }

    public function update($subjectId ,UpdateSubjectRequest $request)
    {

        $data = request()->all();

        $subject = Subject::where('id', $subjectId)->update([
            'name' => $data['name'],
            'classroomId' => $data['classroomId'],
        ]);

        $subject = Subject::find($subjectId);
        return ($subject);
    }

    public function destroy($subjectId)
    {
        Subject::where('id', $subjectId)->delete();
        $allSubjects = Subject::all();
        return  ($allSubjects);
    }
}
