<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubjectMaterial;

class MaterialController extends Controller
{
    public function index()
    {
        $allMaterials =  SubjectMaterial::all();
        return  $allMaterials->all();
    }


    public function show($materialId)
    {
        $material = SubjectMaterial::find($materialId);
        return $material;
    }

    public function store()
    {
        $data = request()->all();

        $material = SubjectMaterial::create([
            'subjectId' => $data['subjectId'],
            'material' => $data['material'],
            'name'=> $data['name'],
        ]);
     
    }

    public function update($materialId)
    {

        $data = request()->all();

        $material = SubjectMaterial::where('id', $materialId)->update([
            'subjectId' => $data['subjectId'],
            'material' => $data['material'],
            'name'=> $data['name'],
        ]);

        $material = SubjectMaterial::find($materialId);
        return $material;
    }

    public function destroy($materialId)
    {
        SubjectMaterial::where('id', $materialId)->delete();
        // $allSubjectMaterials = SubjectMaterial::all();
        // return  SubjectMaterialResource::collection($allMaterials);
    }
}
