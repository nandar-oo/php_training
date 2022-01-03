<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'registerationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password',[AuthController::class,'showForgotPasswordForm'])->name('forget.password.get');
Route::post('/forgot-password',[AuthController::class,'submitForgotPasswordForm'])->name('forget.password.post');

Route::get('/reset-password/{token}',[AuthController::class,'showResetPasswordForm'])->name('reset.password.post');
Route::post('/reset-password',[AuthController::class,'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'showTaskList'])->name('taskList');
    Route::post('/task', [TaskController::class, 'createTask']);
    Route::get('/task/delete/{id}', [TaskController::class, 'deleteTaskById']);
});
