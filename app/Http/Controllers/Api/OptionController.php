<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
  
    public function store($questionId)
    {
        $data=request()->all();
    //   dd($data);
      $option=  Option::create([
        'quistionId'=>$questionId,
        'is_correct'=>$data['is_correct'],
        'value'=>$data['value'],
      ]);
      
        return ($option->id);
    }

    public function update($optionId)
    {
        $data=request()->all();

        Option::where('id',$optionId)->update([
        'value'=>$data['value'],
        'is_correct'=>$data['is_correct'],
      ]);
      
    }

    public function show($optionId)
    {
       
 $option= Option::where('id',$optionId)->get();
     return  $option;
    }

    public function delete($optionId)
    {
       
        Option::where('id',$optionId)->delete();
        return ('option deleted');
    }

}
