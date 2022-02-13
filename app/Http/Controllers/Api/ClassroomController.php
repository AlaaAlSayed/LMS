<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Http\Resources\ClassroomResource;


class ClassroomController extends Controller
{
    public function index()
    {
        $allclassrooms = Classroom::all();
        return  ClassroomResource::collection($allclassrooms);
    }

}
