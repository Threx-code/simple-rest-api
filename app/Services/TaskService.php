<?php

namespace App\Services;

use App\Contracts\TaskServiceInterface;
use App\Helpers\TaskHelper;
use App\Models\Task;
use App\Models\User;
use App\Validators\ValidatorResponse;
use Carbon\Carbon;
use Exception;

class TaskService implements TaskServiceInterface
{
    /**
     * @param TaskHelper $helper
     * @param Task $task
     */
    public function __construct(private readonly TaskHelper $helper, private readonly Task $task){}

    /**
     * @param $id
     * @return mixed
     */
    public function getATask($id): mixed
    {
        return $this->task::where([
            'id' => $id,
            'date_deleted' => null
        ])->first();
    }

    /**
     * @return mixed
     */
    public function getAllTasks(): mixed
    {
        return $this->task::where([
            'date_deleted' => null
        ])->orderBy('id', 'desc')->get();
    }


    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function createTask($request): mixed
    {
        $title = $request->title;
        $taskFile = $request->file_for_task ?? '';
        $data = $this->task::create([
            'title' => $title,
            'description' => $request->description,
            'task_file' => $taskFile,
            'user_id' => $this->helper::randomNumber()
        ]);
        if(($data)){
            return $data;
        }

        ValidatorResponse::validationErrors(
            'Task creation error',
            'Sorry could not create task',
            409,
            'error');
    }


    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function editTask($request, $id): mixed
    {
        $task = $this->getATask($id);
        if(!$task)
        {
            ValidatorResponse::validationErrors(
                'Task not found',
                'Sorry this resource does not exist',
                404,
                'not_found');
        }

        $task->title =  $request->title ?? $task->title;
        $task->description = $request->description ?? $task->description;
        $task->task_file =  $request->file_for_task ?? $task->task_file;
        $task->completed =  $request->completed ?? null;
        $task->save();

        return $task;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteTask($id): bool
    {
        $task = $this->getATask($id);
        if(!$task)
        {
            ValidatorResponse::validationErrors(
                'Task not found',
                'Sorry this resource does not exist',
                404,
                'not_found');
        }

        $task->date_deleted =  Carbon::now();
        $task->save();
        return true;
    }

}
