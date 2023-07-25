<?php

use App\Http\Controllers\LoginController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('add', [StudentController::class, 'create'])->name('add');


// Route::middleware(['auth'])->group(function (){

// });
Route::match(['GET','POST'],'/login',[LoginController::class,'login'])->name('login');


Route::get('student', [StudentController::class, 'index'])->name('st');
Route::post('student', [StudentController::class, 'index'])->name('search');
Route::match(['GET','POST'],'/student/add',[StudentController::class,'create'])->name('route_student_add');
Route::match(['GET','POST'],'/student/edit/{id}',[StudentController::class,'edit'])->name('route_student_edit');
Route::get('/student/delete/{id}',[StudentController::class,'delete'])->name('route_student_delete');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('update', [StudentController::class, 'sua']);
// Route::get('delete', [StudentController::class, 'destroy']);

// Route::post('show', [StudentController::class, 'show'])->name('st');

// Route::get('show_st/{id}', [StudentController::class, 'show_st']);
