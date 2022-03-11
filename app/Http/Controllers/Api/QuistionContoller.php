<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quistion;

class QuistionContoller extends Controller
{
    public function store($examId,$subjectId)
    {
        $data=request()->all();
    //   dd($data);
      $question=  Quistion::create([
        'examId'=>$examId,
        'subjectId'=>$subjectId,//////////delete subject from quistion table
        'value'=>$data['value'],
      ]);
      
        return ($question);
    }

    public function update($questionId)
    {
        $data=request()->all();

  Quistion::where('id',$questionId)->update([
        'value'=>$data['value'],
      ]);
      
    }

    public function show($questionId)
    {
       
 $teacher= Quistion::where('id',$questionId)->get();
     return  $teacher;
    }

    public function delete($questionId)
    {
       
       Quistion::where('id',$questionId)->delete();
        return ('question deleted');
    }

}
