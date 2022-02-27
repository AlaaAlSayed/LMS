<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\TeacherController;
use App\Models\Teacher;
use App\Models\Assignment;
use App\Http\Controllers\Api\UserAvatarController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\AdminController;

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


// Route::middleware('auth')->group(function () {
   
//general for current authenticated user info
Route::get('/user', [AdminController::class, 'user']);
Route::get('/id', [AdminController::class, 'id']);


//admin dashboard -  profile page:
Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/{adminId}',[AdminController::class,'show']);
Route::put('/admins/{adminId}', [AdminController::class, 'update']);

//admin dashboard -  all students page:
Route::get('/students', [StudentController::class, 'index'])->name('api.students.index');
Route::post('/students', [StudentController::class, 'store'])->name('api.students.store');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('api.students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('api.students.destroy');

//admin dashboard  -  all teachers page :
Route::get('/teachers',[TeacherController::class,'index']);
Route::get('/teachers/classroom',[TeacherController::class,'show']);
Route::get('/teachers/showClassroom/{teacherId}/{subjectId}/{classroomId}',[TeacherController::class,'showClassroom']);

Route::get('/teachers/teaches',[TeacherController::class,'teaches']);
Route::post('/teachers',[TeacherController::class,'store']);
Route::put('/teachers/teachesUpdate/{teacherId}/{subjectId}', [TeacherController::class , 'teachesUpdate']);
Route::put('/teachers/{teacherId}', [TeacherController::class , 'update']);
Route::delete('/teachers/{teacherId}', [TeacherController::class , 'destroy']);

//  admin dashboard - classrooms CRUD operations 
Route::get('/classrooms', [ClassroomController::class, 'index'])->name('api.classrooms.index');
Route::post('/classrooms', [ClassroomController::class, 'store'])->name('api.classrooms.store');
Route::put('/classrooms/{classroom}', [ClassroomController::class, 'update'])->name('api.classrooms.update');
Route::delete('/classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('api.classrooms.destroy');
Route::get('/classrooms/{classroom}', [ClassroomController::class, 'show'])->name('api.classrooms.show');

// admin dashboard - classrooms CRUD operations 
Route::get('/subjects', [SubjectController::class, 'index'])->name('api.subjects.index');
Route::post('/subjects', [SubjectController::class, 'store'])->name('api.subjects.store');
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('api.subjects.update');
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('api.subjects.destroy');
Route::get('/subjects/show/{subject}', [SubjectController::class, 'showSubject'])->name('api.subjects.showSubject');


//student dashboard  - home page :
Route::get('/students/{student}/home', [StudentController::class, 'home'])->name('api.students.home');
//student dashboard - profile page :
Route::get('/students/{student}', [StudentController::class, 'show'])->name('api.students.show');
Route::get('/students/image/{student}', [StudentController::class, 'showImage'])->name('api.students.showImage');
//student dashboard - single subject page :
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('api.subjects.show');
// student dashboard  - upload assignment    :
Route::put('/students/upload/{studentId}/{assignmentId}/{subjectId}', [StudentController::class, 'upload'])->name('api.students.upload');


//teacher dashboard  - to get subject of this teacher to this class : 
Route::get('/subjects/teacher/{teacher}/classroom/{classroom}', [TeacherController::class, 'classroomSubject'])->name('api.teachers.classroomSubject');
//teacher dashboard  - profile page :
Route::get('/teachers/{teacherId}',[TeacherController::class,'show']);
Route::get('/teachers/image/{teacherId}', [TeacherController::class, 'showImage'])->name('api.teachers.showImage');

//teacher dashboard  - home page :
Route::get('/teachers/{teacherId}/home', [TeacherController::class, 'home'])->name('api.teachers.home');


// Route::get('uploadFiles', [FileController::class , 'uploadFiles']);
// Route::post('uploadFiles', [FileController::class , 'store']);

//*******************   MATERIALS  ********************
//teacher dashboard  - materials CRUD operations  :
Route::get('/materials', [MaterialController::class, 'index'])->name('api.materials.index');
Route::post('/materials', [MaterialController::class, 'store'])->name('api.materials.store');
Route::put('/materials/{material}', [MaterialController::class, 'update'])->name('api.materials.update');
Route::delete('/materials/{material}', [MaterialController::class, 'destroy'])->name('api.materials.destroy');
Route::get('/materials/{material}', [MaterialController::class, 'show'])->name('api.materials.show');

Route::get('/materials/classroom/{classroom}/teacher/{teacher}', [MaterialController::class, 'classroomMaterials'])->name('api.materials.classroomMaterials');
Route::get('/materials/subject/{subject}', [MaterialController::class, 'subjectMaterials'])->name('api.materials.subjectMaterials');

// show material as pdf
Route::get('/materials/showpdf/{materialId}', [MaterialController::class, 'studentshow'])->name('api.materials.studentshow');

// download material as pdf
Route::get('/materials/download/{materialId}', [MaterialController::class,'download']);


// ***********************     ASSIGNMENTS   *********************
//teacher dashboard  - assignments CRUD operations  :
Route::get('/assignments', [AssignmentController::class, 'index'])->name('api.assignments.index');
Route::post('/assignments/{teacherId}/{subjectId}', [AssignmentController::class, 'store'])->name('api.assignments.store');
Route::put('/assignments/{assignment}', [AssignmentController::class, 'update'])->name('api.assignments.update');
Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('api.assignments.destroy');

// show assignments of given teacher 
Route::get('assignments/teacher/{teacherId}',[AssignmentController::class,'teacherAssignments']);

// download assignment as pdf
Route::get('/assignments/download/{assignmentId}', [AssignmentController::class,'download']);


// show assignment as pdf
Route::get('/assignments/{assignment}', [AssignmentController::class, 'studentshow'])->name('api.assignments.studentshow');
// Route::get('assignments/{teacherId}/{assignmentId}',[AssignmentController::class,'show']);


//*******************   EXAM  ********************
//teacher dashboard  - exam CRUD operations  :

Route::get('/exams', [ExamController::class, 'index'])->name('api.exams.index');
Route::get('/exams/{teacherId}',[ExamController::class,'teacherExams'])->name('api.exams.teacherExams');
Route::get('/exams/{teacherId}/{examId}',[ExamController::class,'show'])->name('api.exams.show');
Route::post('/exams/{teacherId}/{subjectId}',[ExamController::class,'store'])->name('api.exams.store');
Route::put('/exams/{examId}', [ExamController::class , 'update'])->name('api.exams.update');
Route::delete('/exams/{examId}', [ExamController::class , 'destroy'])->name('api.exams.destroy');

// student dashboard  -  take exam  :
Route::put('/exams/{exam}/{student}/{subject}', [ExamController::class, 'take'])->name('api.exams.take');

// });

// ->withoutMiddleware([EnsureTokenIsValid::class]);