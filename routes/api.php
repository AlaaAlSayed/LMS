<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\UserAvatarController;
use App\Http\Controllers\Api\FileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('assignments/{teacherId}',[AssignmentController::class,'index']);
Route::get('assignments/{teacherId}/{assignmentId}',[AssignmentController::class,'show']);
Route::post('assignments/{teacherId}/{deadline}',[AssignmentController::class,'store']);
Route::put('/assignments/{teacherId}/{assignmentId}', [AssignmentController::class , 'update']);
Route::delete('/assignments/{assignmentId}', [AssignmentController::class , 'destroy']);

Route::get('teachers',[TeacherController::class,'index']);
Route::get('teachers/{teacherId}',[TeacherController::class,'show']);
Route::post('teachers',[TeacherController::class,'store']);
Route::put('/teachers/{teacherId}', [TeacherController::class , 'update']);
Route::delete('/teachers/{teacherId}', [TeacherController::class , 'destroy']);


Route::get('classrooms',[ClassroomController::class,'index']);
Route::get('classrooms/{teacherId}',[ClassroomController::class,'show']);


Route::get('exams/{teacherId}',[ExamController::class,'index']);
Route::get('exams/{teacherId}/{examId}',[ExamController::class,'show']);
Route::post('exams/{teacherId}',[ExamController::class,'store']);
Route::put('exams/{teacherId}/{examId}', [ExamController::class , 'update']);
Route::delete('exams/{examId}', [ExamController::class , 'destroy']);


Route::get('uploadFiles', [FileController::class , 'uploadFiles']);
Route::post('uploadFiles', [FileController::class , 'store']);