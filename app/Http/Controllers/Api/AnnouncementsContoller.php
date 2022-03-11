<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Admin;

class AnnouncementsContoller extends Controller
{
  public function index()
  {


    $Posts = Announcement::all();
    return  $Posts;
  }




  public function store()
  {
    //you must run this command first
    //php artisan storage:link


    request()->validate([

      'file' => 'required|mimes:jpeg,pmb,png,jpg,pdf,docs,xlsx|max:10000'
    ]);



    if (request()->hasFile('file')) //if user choose file
    {

      $file = request()->file('file'); //store  uploaded file to variable $file to 
      $extension = $file->getClientOriginalExtension();
      $filename = 'POST' . '_' . time() . '.' . $extension;
      $file->storeAs('public/assets', $filename); //make folder assets in public/storage/assets and put file
      // @dd('jjjjjjjjjj');
    }

    $data = request()->all();
    $Post = Announcement::create([
      'title' => $data['title'],
      'description' => $data['description'],
      'media' => $filename,
      'adminID' => $data['adminID'],

    ]);
    return $Post;
  }


  public function show($postId)
  {

    $Post = Announcement::find($postId);
    $embed_src = asset('storage/assets/' . $Post->media);
    //@dd( $embed_src);
    return response()->json($embed_src);
    // return View('assignment', ['assignment_pdf' => $embed_src]);
  }

  
  public function showPost($postId)
  {
    $Post = Announcement::find($postId);
    return  $Post;
  }



  public function destroy($postId)
  {
    Announcement::where('id', $postId)->delete();
    return 'done';
  }










  public function update($postId)
  {

    $data = request()->all();
    Announcement::where('id', $postId)
      ->update([
        'title' => $data['title'],
        'description' => $data['description'],
        'media' => $data['media']
      ]);

    $Post = Announcement::where('id', $postId)->get()->first();
    return   $Post;
  }
}
