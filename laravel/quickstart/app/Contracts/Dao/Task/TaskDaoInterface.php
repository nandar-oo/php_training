<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
{
    /**
     * To show list of tasks
     * @param
     * @return Object $task ->array of tasks
     */
    public function showTask();

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function saveTask(Request $request);

    /**
     * To delete task by id
     * @param string $id post id
     * @return string $message message success or not
     */
    public function deleteTaskById($id);
}
