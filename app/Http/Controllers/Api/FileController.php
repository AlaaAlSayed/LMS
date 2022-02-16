<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
  public function uploadFiles()
  {
      return view('welcome');
}

public function store(Request $request)
{
    return $request;
}
}