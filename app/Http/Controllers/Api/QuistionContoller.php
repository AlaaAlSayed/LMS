<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quistion;
use Symfony\Component\Console\Question\Question;

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
      
        return ($question->id);
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
     
 $Quistion= Quistion::where('id',$questionId)->get();

     return  $Quistion;
    }

    public function delete($questionId)
    {
       
       Quistion::where('id',$questionId)->delete();
        return ('question deleted');
    }

}
