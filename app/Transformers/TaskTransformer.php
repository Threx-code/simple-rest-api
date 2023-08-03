<?php

namespace App\Transformers;

use App\Validators\ValidatorResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class TaskTransformer
{

    /**
     * @param $task
     * @return array
     */
    public static function transform($task): array
    {
        if (empty($task)) {
            ValidatorResponse::validationErrors(
                'Task not found',
                'Sorry this resource does not exist',
                404,
            'not_found');
        }

        $data['id'] = $task->id;
        $data['title'] = ucwords($task->title);
        $data['task_file'] = $task->task_file;
        $data['description'] = $task->description;
        $data['created_by_id'] = $task->user_id;
        $data['completed'] = $task->completed;
        $data['date_deleted'] = $task->date_deleted;
        $data['created_at'] = Carbon::parse($task->created_at)->format('Y-m-d');
        $data['updated_at'] = Carbon::parse($task->updated_at)->format('Y-m-d');

        return $data;
    }

    }