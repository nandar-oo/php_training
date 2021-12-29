<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface TaskServiceInterface
{
    /**
     * To list tasks
     * @return Object $task->array of tasks
     */
    public function showTask();

    /**
     * To save task
     * @param Request $request request with inputs
     * @return Object $task saved post
     */
    public function saveTask(Request $request);

    /**
     * To delete task by id
     * @param string $id task id
     * @return string $message message success or not
     */
    public function deleteTaskById($id);
}
