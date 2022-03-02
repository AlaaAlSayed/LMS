<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\TeacherController;
use App\Models\Teacher;
use App\Models\Assignment;
use App\Http\Controllers\Api\UserAvatarController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
 

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

// 1|IX5GH2qbPd4Tq9zHv1AUFO7mcDazSRYVOJdpnVby token for admn user
// 2|H66CwHt6QYUW5mwiFEZ02cXszBdBSZ8coFWQQ8N4   token for stud user
Route::post('/sanctum/token', [UserController::class, 'generateToken'] );





Route::middleware('auth:sanctum')->group(function () {

   
//general for current authenticated user info
Route::get('/user', [UserController::class, 'user']);
Route::get('/id', [UserController::class, 'id']);



//admin dashboard -  profile page:
Route::get('/welcome' ,function () {
    return view('welcome');})->name('welcome');

    // ->middleware('IsTeacher');
    // ->middleware('IsAdmin');
    
//admin dashboard -  profile page:
Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/{adminId}',[AdminController::class,'show'])->middleware('IsAdmin');
Route::put('/admins/{adminId}', [AdminController::class, 'update']);

//admin dashboard -  all students page:
Route::get('/students', [StudentController::class, 'index'])->name('api.students.index')->middleware('IsAdmin');
Route::post('/students', [StudentController::class, 'store'])->name('api.students.store');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('api.students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('api.students.destroy');

//admin dashboard  -  all teachers page :
Route::get('/teachers',[TeacherController::class,'index']);
Route::get('/teachers/classroom',[TeacherController::class,'show']);
Route::get('/teachers/showClassroom/{teacherId}/{subjectId}/{classroomId}',[TeacherController::class,'showClassroom']);
// Route::get('/teachers/showClassroom/{Id}',[TeacherController::class,'showClassroom']);

Route::get('/teachers/teaches',[TeacherController::class,'teaches']);
Route::post('/teachers',[TeacherController::class,'store']);
Route::post('/teachers/assign',[TeacherController::class,'assign']);

Route::put('/teachers/teachesUpdate/{teacherId}/{subjectId}', [TeacherController::class , 'teachesUpdate']);
Route::put('/teachers/{teacherId}', [TeacherController::class , 'update']);
Route::delete('/teachers/{teacherId}', [TeacherController::class , 'destroy']);

//  admin dashboard - classrooms CRUD operations 
Route::get('/classrooms', [ClassroomController::class, 'index'])->name('api.classrooms.index');
Route::post('/classrooms', [ClassroomController::class, 'store'])->name('api.classrooms.store');
Route::put('/classrooms/{classroom}', [ClassroomController::class, 'update'])->name('api.classrooms.update');
Route::delete('/classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('api.classrooms.destroy');
Route::get('/classrooms/{classroom}', [ClassroomController::class, 'show'])->name('api.classrooms.show');


//student dashboard  - home page :
Route::get('/students/{student}/home', [StudentController::class, 'home'])->name('api.students.home');
//student dashboard - profile page :
Route::get('/students/{student}', [StudentController::class, 'show'])->name('api.students.show');
Route::get('/students/image/{student}', [StudentController::class, 'showImage'])->name('api.students.showImage');
//student dashboard - single subject page :
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('api.subjects.show');
// student dashboard  - upload assignment    :
Route::post('/students/upload', [StudentController::class, 'upload'])->name('api.students.upload');


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

Route::get('/materials/getFile/{material}', [MaterialController::class, 'getFile']);

Route::get('/materials/classroom/{classroom}/teacher/{teacher}', [MaterialController::class, 'classroomMaterials'])->name('api.materials.classroomMaterials');
Route::get('/materials/subject/{subject}', [MaterialController::class, 'subjectMaterials'])->name('api.materials.subjectMaterials');

// show material as pdf
Route::get('/materials/showpdf/{materialId}', [MaterialController::class, 'studentshow'])->name('api.materials.studentshow');

// download material as pdf
Route::get('/materials/download/{materialId}', [MaterialController::class,'download']);



// ***********************     ASSIGNMENTS   *********************
// teacher dashboard  - assignments CRUD operations  :
Route::get('/assignments', [AssignmentController::class, 'index'])->name('api.assignments.index');
Route::get('/deadline/{assignmentId}', [AssignmentController::class, 'show'])->name('api.assignments.show');
Route::post('/assignments/{teacherId}/{subjectId}', [AssignmentController::class, 'store'])->name('api.assignments.store');
Route::put('/assignments/{assignment}', [AssignmentController::class, 'update'])->name('api.assignments.update');
Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('api.assignments.destroy');

// show assignments of given teacher 
Route::get('/assignments/teacher/{teacherId}',[AssignmentController::class,'teacherAssignments']);

// download assignment as pdf
Route::get('/assignments/download/{assignmentId}', [AssignmentController::class,'download']);

Route::get('/assignments/studentsUploads', [AssignmentController::class, 'studentsUploads']);

Route::get('/assignments/getFile/{assignmentId}', [AssignmentController::class, 'getFile']);


// show assignment as pdf
Route::get('/assignments/{assignmentId}', [AssignmentController::class, 'studentshow'])->name('api.assignments.studentshow');



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

});

// ->withoutMiddleware([EnsureTokenIsValid::class]);



//*******************   MESSAGE  ********************
// users dashboard  - message CRUD operations  :
Route::get('/messages', [MessageController::class, 'index'])->name('api.messages.index');
Route::get('/messages/{userId}',[MessageController::class,'teacherMessages'])->name('api.messages.teacherMessages');
Route::get('/messages/{userId}/{messageId}',[MessageController::class,'show'])->name('api.messages.show');
Route::post('/messages/{teacherId}/{subjectId}',[MessageController::class,'store'])->name('api.messages.store');
Route::put('/messages/{messageId}', [MessageController::class , 'update'])->name('api.messages.update');
Route::delete('/messages/{messageId}', [MessageController::class , 'destroy'])->name('api.messages.destroy');


