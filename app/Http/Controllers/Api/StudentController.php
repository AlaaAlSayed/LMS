<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;
use App\Http\Resources\StudentResource;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        $allStudents = Student::all();
        return  StudentResource::collection($allStudents);
    }


    public function show($studentId)
    {
        $student = Student::find($studentId);
        return new StudentResource($student);
    }

    public function store(StoreStudentRequest $request)
    {
        $data = $request->all();

        $student = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'picture_path' => $data['picture_path'],
            'classroomId' => $data['classroomId'],
            'government' => $data['government'],
            'city' => $data['city'],
            'street' => $data['street'],

        ]);

        // return new StudentResource($student);
    }

    public function update($studentId ,UpdateStudentRequest $request)
    {

        $data = $request->all();


        $student = Student::where('id', $studentId)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'picture_path' => $data['picture_path'],
            'classroomId' => $data['classroomId'],
            'government' => $data['government'],
            'city' => $data['city'],
            'street' => $data['street'],
        ]);

        // $student = Student::find($studentId);
        // return new StudentResource($student);
    }

    public function destroy($studentId)
    {
        Student::where('id', $studentId)->delete();
        // $allStudents = Student::all();
        // return  StudentResource::collection($allStudents);
    }
}
