<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Task\TaskController;
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
Route::post('/login', [AuthController::class, 'login'])->name('login#post');
Route::get('/register', [AuthController::class, 'registerationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register#post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'showTaskList'])->name('taskList');
    Route::post('/task', [TaskController::class, 'createTask']);

    Route::get('/task/delete/{id}', [TaskController::class, 'deleteTaskById']);
});
