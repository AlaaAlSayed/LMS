<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Http\Resources\ClassroomResource;
use App\Http\Requests\UpdateClassroomRequest;
use App\Http\Requests\StoreClassroomRequest;


class ClassroomController extends Controller
{
    // public function index()
    // {
    //     $allclassrooms = Classroom::all();
    //     return  ClassroomResource::collection($allclassrooms);
    // }

    // public function show($classroomId)
    // {
    //     $classroom = Classroom::find($classroomId);
        
    //     // dd($classroom->student[0]->name);

    //     return new ClassroomResource($classroom);
    // }

    // public function store()//StoreClassroomRequest $request)
    // {
    //     $data = request();//->all();

    //     $classroom = Classroom::create([
    //         'level'=> $data['level'],
    //         'capacity'=> $data['capacity'],
    //         'time_table' => $data['time_table'],
    //     ]);

    //     // return new ClassroomResource($classroom);
    // }

    // public function update($classroomId)//,UpdateClassroomRequest $request)
    // {
    //     $data = request();
    //     // $data = $request->all();


    //     $classroom = Classroom::where('id', $classroomId)->update([
    //         'level'=> $data['level'],
    //         'capacity'=> $data['capacity'],
    //         'time_table' => $data['time_table'],
    //     ]);

    //     // $classroom = classroom::find($classroomId);
    //     // return new classroomResource($classroom);
    // }

    // public function destroy($classroomId)
    // {
    //     Classroom::where('id', $classroomId)->delete();
    //     // $allclassrooms = Classroom::all();
    //     // return  ClassroomResource::collection($allclassrooms);
    // }
    public function show($teacherId)
    {
        // @dd(  'ddddddddddddd');
        $teachers=Teacher::find($teacherId);
        return($teachers->classrooms);
    }
    
    // use App\Models\teacher_teaches_subjects;
// use App\Models\Teacher;

// class ClassroomController extends Controller
// {
   

// }
}