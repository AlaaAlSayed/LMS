<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

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

    public function store() //StorePostRequest $request
    {
        $data = request()->all();


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

        return new StudentResource($student);
    }

    public function update($studentId) // , UpdatePostRequest $request)
    {

        $data = request();

        if (isset($data)) {

            Student::where('id', $studentId)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                
                'picture_path' => $data['picture_path'],
                'classroomId' => $data['classroomId'],
                'government' => $data['government'],
                'city' => $data['city'],
                'street' => $data['street'],
            ]);
        } else {

            $student = Student::where('id', $studentId)->get()->first();
        }
        return new StudentResource($student);
    }

    public function destroy($studentId)
    {
        $deleted = Student::where('id', $studentId)->delete();
        return new StudentResource($deleted);
    }

}

