<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\SubjectResource;
class StudentController extends Controller
{
    public function index()
    {
        $allStudents = Student::all();
        return  $allStudents->all();
    }


    public function show($studentId)
    {
        $student = Student::find($studentId);
        return $student ;
        // return new StudentResource($student);
    }
    public function home($studentId)
    {
        $student = Student::find($studentId);
        return   $student->subjects->all();
    }

    public function store(StoreStudentRequest $request)
    {
      

    // $request->validate([
    //     'picture_path' => 'image|mimes:jpeg,pmb,png|max:88453'
    //   ]);
  
  
    //   if ($request->hasFile('picture_path')) //if user choose file
    //   {
  
    //     $file = $request->file('picture_path'); //store  uploaded file to variable $file to 
  
    //     $extension = $file->getClientOriginalExtension();
    //     $filename = 'image' . '_' . time() . '.' . $extension;
    //     $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
     
      
    //   } else {
  
    //     $filename = 'storage/app/public/assets/image_1645107020.jpeg';
    //   }
  
      $data = request()->all();
  
      Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'picture_path' =>$data['picture_path'] ,
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
