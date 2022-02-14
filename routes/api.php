<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\ExamController;
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

Route::get('/alaa', function () {
    return ('welcome to api Alaa');
});

Route::get('/students', [StudentController::class, 'index'])->name('api.students.index');
Route::post('/students', [StudentController::class, 'store'])->name('api.students.store');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('api.students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('api.students.destroy');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('api.students.show');

// to be re-checked on admin dashboard
// Route::get('/classrooms', [ClassroomController::class, 'index'])->name('api.classrooms.index');
// Route::post('/classrooms', [ClassroomController::class, 'store'])->name('api.classrooms.store');
// Route::put('/classrooms/{classroom}', [ClassroomController::class, 'update'])->name('api.classrooms.update');
// Route::delete('/classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('api.classrooms.destroy');
// Route::get('/classrooms/{classroom}', [ClassroomController::class, 'show'])->name('api.classrooms.show');


Route::get('/subjects', [SubjectController::class, 'index'])->name('api.subjects.index');
Route::post('/subjects', [SubjectController::class, 'store'])->name('api.subjects.store');
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('api.subjects.update');
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('api.subjects.destroy');
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('api.subjects.show');


Route::get('/assignments', [AssignmentController::class, 'index'])->name('api.assignments.index');
Route::post('/assignments', [AssignmentController::class, 'store'])->name('api.assignments.store');
Route::put('/assignments/{assignment}', [AssignmentController::class, 'update'])->name('api.assignments.update');
Route::put('/assignments/{assignment}/{student}/{subject}', [AssignmentController::class, 'upload'])->name('api.assignments.upload');
Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('api.assignments.destroy');
Route::get('/assignments/{assignment}', [AssignmentController::class, 'show'])->name('api.assignments.show');



Route::get('/exams', [ExamController::class, 'index'])->name('api.exams.index');
Route::post('/exams', [ExamController::class, 'store'])->name('api.exams.store');
Route::put('/exams/{exam}', [ExamController::class, 'update'])->name('api.exams.update');
Route::put('/exams/{exam}/{student}/{subject}', [ExamController::class, 'take'])->name('api.exams.take');
Route::delete('/exams/{exam}', [ExamController::class, 'destroy'])->name('api.exams.destroy');
Route::get('/exams/{exam}', [ExamController::class, 'show'])->name('api.exams.show');


