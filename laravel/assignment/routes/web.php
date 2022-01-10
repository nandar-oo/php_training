<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentResourceController;

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

Route::get('/', [StudentController::class, 'showStudentList'])->name('studentList');

Route::get('/students/add', [StudentController::class, 'showStudentForm'])->name('addStudent.get');

Route::post('/students/add', [StudentController::class, 'submitStudentForm'])->name('addStudent.post');

Route::get('/student/edit/{id}', [StudentController::class, 'showStudentEditForm'])->name('edit.student.get');

Route::post('/student/edit/{id}', [StudentController::class, 'submitStudentEditForm'])->name('edit.student.post');

Route::get('/student/delete/{id}', [StudentController::class, 'deleteStudent'])->name('delete.student');

Route::get('/student/export', [StudentController::class, 'export'])->name('student.export');

Route::get('/student/import/', [StudentController::class, 'showImportForm'])->name('student.import.get');

Route::post('/student/import/', [StudentController::class, 'import'])->name('student.import.post');

Route::get('/student/search', [StudentController::class, 'showSearchForm'])->name('search.get');

Route::post('/student/search', [StudentController::class, 'submitSearchForm'])->name('search.post');

Route::get('/mail/send',[StudentController::class,'showMailForm'])->name('mail.get');

Route::post('/mail/send',[StudentController::class,'submitMailForm'])->name('mail.post');



Route::get('/login',[AuthController::class,'showLoginForm'])->name('login.get');

Route::post('/login',[AuthController::class,'submitLoginForm'])->name('login.post');

Route::get('/register',[AuthController::class,'submitRegisterationForm'])->name('register.get');

Route::post('/register',[AuthController::class,'submitRegisterationForm'])->name('register.post');

Route::resource('/students', StudentResourceController::class);


Route::group(['prefix'=>'/api-view/'],function (){
    Route::get('/students',[StudentController::class,'index'])->name('api.studentList');

    Route::get('students/add',[StudentController::class,'showStudentFormApi'])->name('api.add.student');

    Route::get('/students/edit/{id}', [StudentController::class, 'showEditFormApi'])->name('api.edit.student');
});
