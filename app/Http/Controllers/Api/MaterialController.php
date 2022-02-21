<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubjectMaterial;

class MaterialController extends Controller
{
    public function index($subjectId)
    {
        $allMaterials =  SubjectMaterial::all();
        return  $allMaterials->all();
    }

    public function subjectMaterials($subjectId)
    {
        $allMaterials = SubjectMaterial::find($subjectId)->all();
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

        SubjectMaterial::create([
            'subjectId' => $data['subjectId'],
            'material' => $data['material'],
            'name'=> $data['name'],
        ]);
        $allMaterials = SubjectMaterial::all();
        return $allMaterials->all();
     
    }

    public function update($materialId)
    {

        $data = request()->all();

        SubjectMaterial::where('id', $materialId)->update([
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
        $allMaterials = SubjectMaterial::all();
        return  $allMaterials->all();
    }
}
