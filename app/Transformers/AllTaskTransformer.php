<?php

namespace App\Transformers;

use App\Validators\ValidatorResponse;
use Carbon\Carbon;

class AllTaskTransformer
{
    /**
     * @param $tasks
     * @return array
     */
    public static function transform($tasks): array
    {
        $data = [];
        $tasks->each(function ($task, $key) use(&$data) {
            $data[$key]['id'] = $task->id;
            $data[$key]['title'] = ucwords($task->title);
            $data[$key]['task_file'] = $task->task_file;
            $data[$key]['description'] = $task->description;
            $data[$key]['created_by_id'] = $task->user_id;
            $data[$key]['completed'] = $task->completed;
            $data[$key]['date_deleted'] = $task->date_deleted;
            $data[$key]['created_at'] = Carbon::parse($task->created_at)->format('Y-m-d');
            $data[$key]['updated_at'] = Carbon::parse($task->updated_at)->format('Y-m-d');
        });

        if(empty($data)){
            ValidatorResponse::validationErrors(
                'Tasks not found',
                'Sorry there are no resources',
                404,
                'not_found');
        }

        return $data;
    }

}