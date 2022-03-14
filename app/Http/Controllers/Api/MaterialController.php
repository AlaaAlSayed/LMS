<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SubjectMaterial;
use App\Models\teacher_teaches_subjects;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MaterialUploaded;

class MaterialController extends Controller
{
    public function index()
    {
        $allMaterials =  SubjectMaterial::all();
        return  $allMaterials->all();
    }

    public function subjectMaterials($subjectId)
    {
        $allMaterials = SubjectMaterial::find($subjectId)->all();
        return  $allMaterials->all();
    }
    public function studentshow($materialId)
    {
      $material = SubjectMaterial::find($materialId);
      $embed_src= asset('storage/assets/'. $material->material);
      return response()->json($embed_src);
    }
  
    public function download($materialId)
    {
      $material = SubjectMaterial::find($materialId);
      return response()->download('storage/assets/' . $material->material);
    }

    
    public function classroomMaterials($classroomId,$teacherId)
    {
        $subjectId= teacher_teaches_subjects::
        where([['teacherId','=',$teacherId ],['classroomId','=',$classroomId]])->get('subjectId');
        
        $allMaterials = SubjectMaterial::find($subjectId)->first();
        return  $allMaterials->all();
    }

    public function show($materialId)
    {
        $material = SubjectMaterial::find($materialId);
        return $material;
    }
    public function getFile($materialId)
    {
        $material = SubjectMaterial::find($materialId);
        return response()->file('storage/assets/'. $material->material) ;
       
    }
    
    public function store()
    {
        request()->validate([
            'material' => 'mimes:pdf,docs,xlsx|max:10000'
        ]);


        if (request()->hasFile('material')) //if user choose file
        {

            $file = request()->file('material'); //store  uploaded file to variable $file to       
            $extension = $file->getClientOriginalExtension();
            $filename = 'material' . '_' . time() . '.' . $extension;
            $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
            // 
        } else {

            $filename = 'storage/app/public/assets/material_temp.pdf';
        }

        $data = request()->all();
        
        SubjectMaterial::create([
            'subjectId' => $data['subjectId'],
            'material' => $filename,
            'name' => $data['name'],
        ]);

        $subject=Subject::find ($data['subjectId']);
        $students=Student::where('classroomId',$subject->classroomId)->get()->all();
        Notification::send($students, new MaterialUploaded( "material",$data['name'] , $subject->name )); //one to many
        
        
        $allMaterials = SubjectMaterial::all();
        return $allMaterials->all();
    }

    public function update($materialId)//,Request $request)
    {
        request()->validate([
            'material' => 'mimes:pdf,docs,xlsx|max:10000'
        ]);


        if (request()->hasFile('material')) //if user choose file
        {

            $file = request()->file('material'); //store  uploaded file to variable $file to       
            $extension = $file->getClientOriginalExtension();
            $filename = 'material' . '_' . time() . '.' . $extension;
            $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
            // $data = request()->all();
        } else {

            $filename = SubjectMaterial::where('id', $materialId)->find('material');
        }

        $data = request()->all();

        SubjectMaterial::where('id', $materialId)->update([
            // 'subjectId' => $data['subjectId'],
            'material' =>  $filename,
            'name' => $data['name'],
        ]);

        $material = SubjectMaterial::find($materialId);
        return $material;
    }

    public function destroy($materialId)
    {
        SubjectMaterial::where('id', $materialId)->delete();
        $allMaterials = SubjectMaterial::all();
        return  $allMaterials->all();
    }
}
