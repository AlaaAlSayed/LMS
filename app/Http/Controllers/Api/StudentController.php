<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use App\Models\Assignment;
use App\Models\StudentUploadAssignment;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $allStudents =  User::join('students', 'students.id', '=', 'users.id')->get()->all();
        return  $allStudents;
    }

    public function showImage($studentId)
    {
        $picture_path = Student::find($studentId)->picture_path;
        $imgsrc = asset('storage/assets/' . $picture_path);
        return response()->json($imgsrc);
    }

    public function show($studentId)
    {
        $student =  User::join('students', 'students.id', '=', 'users.id')->find($studentId)->first();
        return $student;
    }
    public function home($studentId)
    {
        $student = Student::find($studentId);
        $subjects = Subject::where('classroomId', '=', $student->classroomId)->get();
        return  $subjects;
    }

    public function store()
    {
        request()->validate([
            'picture_path' => 'image|mimes:jpeg,pmb,png,jpg|max:88453'
        ]);


        if (request()->hasFile('picture_path')) { //if user choose file
            $file = request()->file('picture_path'); //store  uploaded file to variable $file to

            $extension = $file->getClientOriginalExtension();
            $filename = 'student-image' . '_' . time() . '.' . $extension;
            $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
        } else {
            $filename = 'storage/app/public/assets/image_tmp.jpeg';
        }

        $data = request()->all();
       
        $newUser=User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'password' => password_hash( $data['password'],PASSWORD_DEFAULT ),
            'roleId' => '3',
            'government' => $data['government'],
            'city' => $data['city'],
            'street' => $data['street'],
        ]);
        
        Student::create([
            'id' => $newUser->id,
            'phone' => $data['phone'],
            'picture_path' =>  $filename,
            'classroomId' => $data['classroomId'],
          
        ]);

        $allStudents =  User::join('students', 'students.id', '=', 'users.id')->get()->all();
        return  $allStudents;
    }

    public function update($studentId)
    {
        request()->validate([
            'picture_path' => 'image|mimes:jpeg,pmb,png,jpg|max:88453'
        ]);


        if (request()->hasFile('picture_path')) { //if user choose file
            $file = request()->file('picture_path'); //store  uploaded file to variable $file to
            $extension = $file->getClientOriginalExtension();
            $filename = 'student-image' . '_' . time() . '.' . $extension;
            $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
        } else {
            $filename =  Student::where('id', $studentId)->get('picture_path');
        }

        $data = request()->all();

     
        User::where('id', $studentId)->update([
            'username' => $data['username'],
            'name' => $data['name'],
            'password' => password_hash( $data['password'],PASSWORD_DEFAULT ),
            // 'roleId' => '3',
            'government' => $data['government'],
            'city' => $data['city'],
            'street' => $data['street'],
        ]);
        
        Student::where('id', $studentId)->update([
            'phone' => $data['phone'],
            'picture_path' =>  $filename,
            'classroomId' => $data['classroomId'],

        ]);
        $student =  User::join('students', 'students.id', '=', 'users.id')->find($studentId);
        return $student;
    }

    public function destroy($studentId)
    {
        $student =  User::join('students', 'students.id', '=', 'users.id')->find($studentId);
        if ($student )
       {
           User::where('id', $studentId)->delete();
           $allStudents =  User::join('students', 'students.id', '=', 'users.id')->get()->all();
           return  $allStudents;
       }
        // Student::where('id', $studentId)->delete();
        return  "not student";
        
    }



    public function upload($studentId, $assignmentId, $subjectId)
    {
        request()->validate([
            'answer' => 'required|mimes:pdf|max:10000'
        ]);

        if (request()->hasFile('answer')) { //if user choose file
            $file = request()->file('answer'); //store  uploaded file to variable $file to
            $extension = $file->getClientOriginalExtension();
            $filename = 'Answer_' . $studentId .  '_' . time() . '.' . $extension;
            $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
        } else {
            $filename = 'storage/app/public/assets/Assignment_tmp.pdf';
        }

        $data = request()->all();

        $assignment = StudentUploadAssignment::create([
            'studentId' => $studentId,
            'subjectId' => $subjectId,
            'assignmentId' => $assignmentId,
            'answer' => $filename,
        ]);

        
        $StudentsUploadAssignment = StudentUploadAssignment::all();
        return ($StudentsUploadAssignment);
    }
}
