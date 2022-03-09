<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\AnnouncementsContoller;
use App\Http\Controllers\Api\ChatController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
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


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// *********************************  LOGIN *****************************
Route::post('/sanctum/token', [UserController::class, 'generateToken'] );

// *************************  HOME PAGE ******************************
Route::get('/annoncemetns', [AnnouncementsContoller::class, 'index'])->name('login');
Route::get('/annoncemetns/showPost/{postId}', [AnnouncementsContoller::class, 'showPost']);
Route::get('/annoncemetns/{postId}', [AnnouncementsContoller::class, 'show']);


//***********************************  AUTH **************************** */
Route::middleware('auth:sanctum')->group(function () {

// Route::middleware('auth:sanctum')->group(function () {
   
//general for current authenticated user info
Route::get('/user', [UserController::class, 'user']);
Route::get('/id', [UserController::class, 'id']);


// Route::group(['middleware' => ['CheckRole:Admin,Student']], function() {
  
// });
//----------------------------- IsAdmin --------------------------------------------
Route::middleware('IsAdmin')->group(function () {

//admin dashboard -  posts crud operations :
Route::delete('/annoncemetns/{postId}', [AnnouncementsContoller::class, 'destroy']);
Route::put('/annoncemetns/{postId}', [AnnouncementsContoller::class, 'update']);
Route::post('/annoncemetns', [AnnouncementsContoller::class, 'store']);


//admin dashboard -  profile page:
Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/{adminId}',[AdminController::class,'show']);
Route::put('/admins/{adminId}', [AdminController::class, 'update']);

//admin dashboard -  all students page:
Route::get('/students', [StudentController::class, 'index'])->name('api.students.index');
// Route::post('/students', [StudentController::class, 'store'])->name('api.students.store');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('api.students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('api.students.destroy');

//admin dashboard  -  all teachers page :
Route::post('/teachers/assign',[TeacherController::class,'assign']);
Route::put('/teachers/teachesUpdate/{teacherId}/{subjectId}', [TeacherController::class , 'teachesUpdate']);

Route::get('/teachers',[TeacherController::class,'index']);
Route::post('/teachers',[TeacherController::class,'store']);
Route::put('/teachers/{teacherId}', [TeacherController::class , 'update']);
Route::delete('/teachers/{teacherId}', [TeacherController::class , 'destroy']);

//  admin dashboard - classrooms CRUD operations 
Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::post('/classrooms', [ClassroomController::class, 'store']);
Route::put('/classrooms/{classroom}', [ClassroomController::class, 'update']);
Route::delete('/classrooms/{classroom}', [ClassroomController::class, 'destroy']);
Route::get('/classrooms/{classroom}', [ClassroomController::class, 'show']);

//  admin dashboard - subjects CRUD operations 
Route::post('/subjects', [SubjectController::class, 'store']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::put('/subjects/{subjectId}', [SubjectController::class, 'update']);
Route::delete('/subjects/{subjectId}', [SubjectController::class, 'destroy']);
Route::get('/subjects/showSubject/{subjectId}', [SubjectController::class, 'showSubject']);

}); // end of IsAdmin



//----------------------------- IsTeacher --------------------------------------------



Route::middleware('IsTeacher')->group(function () {

//teacher dashboard  - to get subject of this teacher to this class : 
Route::get('/subjects/teacher/{teacher}/classroom/{classroom}', [TeacherController::class, 'classroomSubject']);
//teacher dashboard  - profile page :
Route::get('/teachers/image/{teacherId}', [TeacherController::class, 'showImage']);

//teacher dashboard  - home page :
Route::get('/teachers/{teacherId}/home', [TeacherController::class, 'home'])->name('api.teachers.home');

}); // end of IsTeacher

Route::get('/teachers/showClassroom/{teachesId}',[TeacherController::class,'showClassroom'])->middleware('CheckRole:Admin');
Route::get('/teachers/teaches',[TeacherController::class,'teaches'])->middleware('CheckRole:Admin');
Route::get('/teachers/{teacherId}',[TeacherController::class,'show'])->middleware('CheckRole:Admin,Teacher');

//----------------------------- IsStudent --------------------------------------------
Route::middleware('IsStudent')->group(function () {

    //student dashboard  - home page :
    Route::get('/students/{student}/home', [StudentController::class, 'home'])->name('api.students.home');
    //student dashboard - profile page :
    Route::get('/students/image/{student}', [StudentController::class, 'showImage']);
    //student dashboard - single subject page :
    Route::get('/subjects/{subject}', [SubjectController::class, 'show']);
    // student dashboard  - upload assignment    :
    Route::post('/students/upload', [StudentController::class, 'upload']);
    
    }); // end of IsStudent
    Route::get('/students/{student}', [StudentController::class, 'show'])->middleware('CheckRole:Admin,Student');

//*******************   MATERIALS  ********************
//teacher dashboard  - materials CRUD operations  :
Route::get('/materials', [MaterialController::class, 'index']);
Route::post('/materials', [MaterialController::class, 'store']);
Route::put('/materials/{material}', [MaterialController::class, 'update']);
Route::delete('/materials/{material}', [MaterialController::class, 'destroy']);

Route::get('/materials/getFile/{material}', [MaterialController::class, 'getFile']);
Route::get('/materials/classroom/{classroom}/teacher/{teacher}', [MaterialController::class, 'classroomMaterials']);
Route::get('/materials/subject/{subject}', [MaterialController::class, 'subjectMaterials']);

// show material as pdf
Route::get('/materials/showpdf/{materialId}', [MaterialController::class, 'studentshow']);

// download material as pdf
Route::get('/materials/download/{materialId}', [MaterialController::class,'download']);

Route::get('/materials/{material}', [MaterialController::class, 'show']);



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


});
// //*******************   EXAM  ********************
// //teacher dashboard  - exam CRUD operations  :

// Route::get('/exams', [ExamController::class, 'index'])->name('api.exams.index');
// Route::get('/exams/{teacherId}',[ExamController::class,'teacherExams'])->name('api.exams.teacherExams');
// Route::get('/exams/{teacherId}/{examId}',[ExamController::class,'show'])->name('api.exams.show');
// Route::post('/exams/{teacherId}/{subjectId}',[ExamController::class,'store'])->name('api.exams.store');
// Route::put('/exams/{examId}', [ExamController::class , 'update'])->name('api.exams.update');
// Route::delete('/exams/{examId}', [ExamController::class , 'destroy'])->name('api.exams.destroy');

// student dashboard  -  take exam  :
Route::put('/exams/{exam}/{student}/{subject}', [ExamController::class, 'take'])->name('api.exams.take');

// });

// ->withoutMiddleware([EnsureTokenIsValid::class]);

Route::post('/exams/{examId}/{studentId}/{selectedOptions}', [ExamController::class , 'score'])->name('api.exams.score');
Route::get('/exams/{teacherId}/{examId}',[ExamController::class,'show'])->name('api.exams.show');
Route::post('/exams/{teacherId}/{subjectId}',[ExamController::class,'store'])->name('api.exams.store');
Route::put('/exams/{examId}', [ExamController::class , 'update'])->name('api.exams.update');
Route::delete('/exams/{examId}', [ExamController::class , 'destroy'])->name('api.exams.destroy');

//------------------------   MESSAGE for all users -----------------------
// users dashboard  - message CRUD operations  :
// Route::get('/messages', [MessageController::class, 'index']);
// Route::get('/messages/{userId}',[MessageController::class,'teacherMessages']);
// Route::get('/messages/{userId}/{messageId}',[MessageController::class,'show']);
// Route::post('/messages/{teacherId}/{subjectId}',[MessageController::class,'store']);
// Route::put('/messages/{messageId}', [MessageController::class , 'update']);
// Route::delete('/messages/{messageId}', [MessageController::class , 'destroy']);

Route::get('/chatUsers', [ChatController::class, 'chatUsers'])->name('ChatUsers');
Route::get('/chat', [ChatController::class, 'index']);
Route::get('/messages', [ChatController::class, 'fetchMessages']);
Route::post('/messages', [ChatController::class, 'sendMessage']);
// Route::post('/messages', [ChatController::class, 'send']);
// Route::get('/messages/{userId}',[ChatController::class,'fetchMessages']);
// Route::get('/chat', [ChatController::class,'getIndex']);

Route::get('/question/{questionId}',[QuistionContoller::class,'show'])->name('api.questions.show');
Route::post('/question/{examId}/{subjectId}',[QuistionContoller::class,'store'])->name('api.questions.store');
Route::put('/question/{questionId}', [QuistionContoller::class , 'update'])->name('api.questions.update');
Route::delete('/question/{questionId}',[QuistionContoller::class,'delete'])->name('api.questions.delete');



// ->withoutMiddleware([EnsureTokenIsValid::class]);
Route::get('/option/{optionId}',[OptionController::class,'show'])->name('api.option.show');
Route::post('/option/{questionId}',[OptionController::class,'store'])->name('api.option.store');
Route::put('/option/{optionId}', [OptionController::class , 'update'])->name('api.option.update');


Route::delete('/option/{optionId}',[OptionController::class,'delete'])->name('api.option.delete');
