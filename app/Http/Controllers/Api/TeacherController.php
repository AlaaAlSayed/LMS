<?php

namespace App\Http\Controllers\Api;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function show($teacherId)
    { 
        $teacher= Teacher::find($teacherId);
            @dd( $teacher->subject);
          //  return($teacher->assignment);
        
      

    }

    public function index()
  {
      $teachers=Teacher::find(1);
      @dd(  $teachers -> subject);
    return($teachers);

   
}

 

  public function store() {
  
   $data=request()->all();
//    @dd( $data);
   $teacher= Teacher::create([
        'name'=>$data['name'],
        'email'=>$data['email'],
         'phone'=>$data['phone'],  
         'government'=>$data['government'],
         'city'=>$data['city'],
          'street'=>$data['street'],  
    ]); 
    return($teacher);

}
public function update($teacherId){
  $data=request()->all();
  //@dd( $data);
    $teacher= Teacher::where('id',$teacherId)->update([
         'name'=>$data['name'],
         'email'=>$data['email'],
          'phone'=>$data['phone'],  
          'government'=>$data['government'],
          'city'=>$data['city'],
           'street'=>$data['street'],  
     ]); 
    
    // @dd( $data);
     return($teacher);
 
  }

public function destroy($teacherId) {
  
    Teacher::where('id', $teacherId)->delete();
     
 
 }


 

//  public function update(Request $request, $teacherId)
//  {
//     $teacher= Teacher::where('id', '=', $teacherId)->first();
 
//    $teacher->update($request->all());
//         return($teacher);

//  }
 
}
