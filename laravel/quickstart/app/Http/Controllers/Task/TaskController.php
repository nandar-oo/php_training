<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    private $taskInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * To show task list
     *
     * @return View task list
     */
    public function showTaskList()
    {
        $tasks = $this->taskInterface->showTask();

        return view('tasks', compact('tasks'));
    }
    /**
     * To save new task
     * @param Request $request request with inputs
     * @return string $message message success or not
     */
    public function createTask(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $task = $this->taskInterface->saveTask($request);
        return redirect('/')->with(['createMessage' => 'The new task is created successfully!']);
    }

    /**
     * To delete task by id
     * @param string $id post id
     * @return string $message message success or not
     */
    public function deleteTaskById($id)
    {
        $message = $this->taskInterface->deleteTaskById($id);
        return back()->with(['deleteMessage' => $message]);
    }
}
