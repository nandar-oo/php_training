<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentApiController;

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

Route::get('/students',[StudentApiController::class,'showStudentList']);
Route::post('/students',[StudentApiController::class,'createStudent']);
Route::put('/students/{id}',[StudentApiController::class,'editStudent']);
Route::delete('/students/{id}',[StudentApiController::class,'deleteStudent']);
