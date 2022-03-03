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
use App\Http\Controllers\Api\ChatsController;

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

$id=Route::get('/id', [UserController::class, 'id']);


//admin dashboard -  profile page:
Route::get('/welcome' ,function () {
    return view('welcome');
})->name('login');
    // ->middleware('IsTeacher');
    // ->middleware('IsAdmin');
    
//admin dashboard -  profile page:
Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/{adminId}',[AdminController::class,'show'])->name('api.admins.home')->middleware('IsAdmin');
Route::put('/admins/{adminId}', [AdminController::class, 'update']);

//admin dashboard -  all students page:
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{student}', [StudentController::class, 'update']);
Route::delete('/students/{student}', [StudentController::class, 'destroy']);

//admin dashboard  -  all teachers page :
Route::get('/teachers',[TeacherController::class,'index']);
Route::get('/teachers/classroom',[TeacherController::class,'show']);
Route::get('/teachers/showClassroom/{teachesId}',[TeacherController::class,'showClassroom']);
// Route::get('/teachers/showClassroom/{Id}',[TeacherController::class,'showClassroom']);

Route::get('/teachers/teaches',[TeacherController::class,'teaches']);
Route::post('/teachers',[TeacherController::class,'store']);
Route::post('/teachers/assign',[TeacherController::class,'assign']);

Route::put('/teachers/teachesUpdate/{teacherId}/{subjectId}', [TeacherController::class , 'teachesUpdate']);
Route::put('/teachers/{teacherId}', [TeacherController::class , 'update']);
Route::delete('/teachers/{teacherId}', [TeacherController::class , 'destroy']);

//  admin dashboard - classrooms CRUD operations 
Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::post('/classrooms', [ClassroomController::class, 'store']);
Route::put('/classrooms/{classroom}', [ClassroomController::class, 'update']);
Route::delete('/classrooms/{classroom}', [ClassroomController::class, 'destroy']);
Route::get('/classrooms/{classroom}', [ClassroomController::class, 'show']);

Route::post('/subjects', [SubjectController::class, 'store']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::put('/subjects/{subjectId}', [SubjectController::class, 'update']);
Route::delete('/subjects/{subjectId}', [SubjectController::class, 'destroy']);
Route::get('/subjects/showSubject/{subjectId}', [SubjectController::class, 'showSubject']);


//student dashboard  - home page :
Route::get('/students/{student}/home', [StudentController::class, 'home'])->name('api.students.home');
//student dashboard - profile page :
Route::get('/students/{student}', [StudentController::class, 'show']);
Route::get('/students/image/{student}', [StudentController::class, 'showImage']);
//student dashboard - single subject page :
Route::get('/subjects/{subject}', [SubjectController::class, 'show']);
// student dashboard  - upload assignment    :
Route::post('/students/upload', [StudentController::class, 'upload']);


//teacher dashboard  - to get subject of this teacher to this class : 
Route::get('/subjects/teacher/{teacher}/classroom/{classroom}', [TeacherController::class, 'classroomSubject']);
//teacher dashboard  - profile page :
Route::get('/teachers/{teacherId}',[TeacherController::class,'show']);
Route::get('/teachers/image/{teacherId}', [TeacherController::class, 'showImage']);

//teacher dashboard  - home page :
Route::get('/teachers/{teacherId}/home', [TeacherController::class, 'home'])->name('api.teachers.home');


// Route::get('uploadFiles', [FileController::class , 'uploadFiles']);
// Route::post('uploadFiles', [FileController::class , 'store']);

//*******************   MATERIALS  ********************
//teacher dashboard  - materials CRUD operations  :
Route::get('/materials', [MaterialController::class, 'index']);
Route::post('/materials', [MaterialController::class, 'store']);
Route::put('/materials/{material}', [MaterialController::class, 'update']);
Route::delete('/materials/{material}', [MaterialController::class, 'destroy']);
Route::get('/materials/{material}', [MaterialController::class, 'show']);

Route::get('/materials/getFile/{material}', [MaterialController::class, 'getFile']);

Route::get('/materials/classroom/{classroom}/teacher/{teacher}', [MaterialController::class, 'classroomMaterials']);
Route::get('/materials/subject/{subject}', [MaterialController::class, 'subjectMaterials']);

// show material as pdf
Route::get('/materials/showpdf/{materialId}', [MaterialController::class, 'studentshow']);

// download material as pdf
Route::get('/materials/download/{materialId}', [MaterialController::class,'download']);



// ***********************     ASSIGNMENTS   *********************
// teacher dashboard  - assignments CRUD operations  :
Route::get('/assignments', [AssignmentController::class, 'index']);
Route::get('/deadline/{assignmentId}', [AssignmentController::class, 'show']);
Route::post('/assignments/{teacherId}/{subjectId}', [AssignmentController::class, 'store']);
Route::put('/assignments/{assignment}', [AssignmentController::class, 'update']);
Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy']);

// show assignments of given teacher 
Route::get('/assignments/teacher/{teacherId}',[AssignmentController::class,'teacherAssignments']);

// download assignment as pdf
Route::get('/assignments/download/{assignmentId}', [AssignmentController::class,'download']);

Route::get('/assignments/studentsUploads', [AssignmentController::class, 'studentsUploads']);

Route::get('/assignments/getFile/{assignmentId}', [AssignmentController::class, 'getFile']);


// show assignment as pdf
Route::get('/assignments/{assignmentId}', [AssignmentController::class, 'studentshow']);



//*******************   EXAM  ********************
//teacher dashboard  - exam CRUD operations  :

Route::get('/exams', [ExamController::class, 'index']);
Route::get('/exams/{teacherId}',[ExamController::class,'teacherExams']);
Route::get('/exams/{teacherId}/{examId}',[ExamController::class,'show']);
Route::post('/exams/{teacherId}/{subjectId}',[ExamController::class,'store']);
Route::put('/exams/{examId}', [ExamController::class , 'update']);
Route::delete('/exams/{examId}', [ExamController::class , 'destroy']);


// student dashboard  -  take exam  :
Route::put('/exams/{exam}/{student}/{subject}', [ExamController::class, 'take']);



// ->withoutMiddleware([EnsureTokenIsValid::class]);



//*******************   MESSAGE  ********************
// users dashboard  - message CRUD operations  :
Route::get('/messages', [MessageController::class, 'index']);
Route::get('/messages/{userId}',[MessageController::class,'teacherMessages']);
Route::get('/messages/{userId}/{messageId}',[MessageController::class,'show']);
Route::post('/messages/{teacherId}/{subjectId}',[MessageController::class,'store']);
Route::put('/messages/{messageId}', [MessageController::class , 'update']);
Route::delete('/messages/{messageId}', [MessageController::class , 'destroy']);



});



Route::get('/chat', [ChatsController::class, 'index']);
Route::get('/messages', [ChatsController::class, 'fetchMessages']);
Route::post('/messages', [ChatsController::class, 'sendMessage']);