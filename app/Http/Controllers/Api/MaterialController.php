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
        request()->validate([
            'input_file' => 'required|mimes:pdf,docs,xlsx|max:10000'
        ]);


        if (request()->hasFile('input_file')) //if user choose file
        {

            $file = request()->file('input_file'); //store  uploaded file to variable $file to       
            $extension = $file->getClientOriginalExtension();
            $filename = 'material' . '_' . time() . '.' . $extension;
            $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
            $data = request()->all();
        } else {

            $filename = 'storage/app/public/assets/material_temp.pdf';
        }


        SubjectMaterial::create([
            'subjectId' => $data['subjectId'],
            'material' => $filename,
            'name' => $data['name'],
        ]);
        $allMaterials = SubjectMaterial::all();
        return $allMaterials->all();
    }

    public function update($materialId)
    {
        request()->validate([
            'input_file' => 'required|mimes:pdf,docs,xlsx|max:10000'
        ]);


        if (request()->hasFile('input_file')) //if user choose file
        {

            $file = request()->file('input_file'); //store  uploaded file to variable $file to       
            $extension = $file->getClientOriginalExtension();
            $filename = 'material' . '_' . time() . '.' . $extension;
            $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
            $data = request()->all();
        } else {

            $filename = SubjectMaterial::where('id', $materialId)->find('material');
        }

        $data = request()->all();

        SubjectMaterial::where('id', $materialId)->update([
            'subjectId' => $data['subjectId'],
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
