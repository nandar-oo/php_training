<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
    /**
     * task dao
     */
    private $taskDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    /**
     * To show task list
     * @param
     * @return Object $post ->list of tasks
     */
    public function showTask()
    {
        return $this->taskDao->showTask();
    }

    /**
     * To save new task
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveTask(Request $request)
    {
        return $this->taskDao->saveTask($request);
    }

     /**
     * To delete task by id
     * @param string $id post id
     * @return string $message message success or not
     */
    public function deleteTaskById($id){
        $message=$this->taskDao->deleteTaskById($id);
        return $message;
    }
}
