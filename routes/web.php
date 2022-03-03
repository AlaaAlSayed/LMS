<?php
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LmsController;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Assignment;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('chat','users.messages');

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/chat', [App\Http\Controllers\Api\ChatsController::class, 'index']);
Route::get('/messages', [App\Http\Controllers\Api\ChatsController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\Api\ChatsController::class, 'sendMessage']);