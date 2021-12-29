<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TaskDao implements TaskDaoInterface
{
    /**
     * To show task list
     * @param
     * @return Object $post ->list of tasks
     */
    public function showTask()
    {
        $task = Task::orderBy('created_at', 'asc')->get();
        return $task;
    }

    /**
     * To save task
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveTask(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return $task;
    }

    /**
     * To delete task by id
     * @param string $id post id
     * @return string $message message success or not
     */
    public function deleteTaskById($id){
        $task = Task::find($id);
        $task->delete();
        return "Deleted successfully!";
    }
}
