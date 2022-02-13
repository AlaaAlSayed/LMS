<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\SubjectController;

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


