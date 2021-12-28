<?php

use App\Models\Task;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});
Route::post('/task', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|max:255',
    ]);
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/')->with(['success' => "The task is added successfully."]);
});

Route::get('/task/delete/{id}', function ($id) {
    $task = Task::find($id);
    $task->delete();
    return back();
});
