<?php

namespace App\Http\Controllers\V1;

use App\Contracts\TaskInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\tasks\DeleteTaskRequest;
use App\Http\Requests\tasks\TaskCreateRequest;
use App\Http\Requests\tasks\UpdateTaskRequest;
use App\Transformers\AllTaskTransformer;
use App\Transformers\TaskTransformer;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //private TaskInterface $taskRepository;

    public function __construct(private readonly TaskInterface $taskRepository){}

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function getATask(Request $request, $id): JsonResponse
    {
        $task = $this->taskRepository->getATask($id);
        return response()->json(TaskTransformer::transform($task));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllTasks(Request $request): JsonResponse
    {
        $tasks = $this->taskRepository->getAllTasks();

        return response()->json(AllTaskTransformer::transform($tasks));
    }

    /**
     * @param TaskCreateRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(TaskCreateRequest $request): JsonResponse
    {
        $task = $this->taskRepository->createTask($request);
        return response()->json(TaskTransformer::transform($task), 201);

    }

    /**
     * @param UpdateTaskRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateTaskRequest $request, $id): JsonResponse
    {
        $task = $this->taskRepository->editTask($request, $id);
        return response()->json(TaskTransformer::transform($task));
    }

    /**
     * @param DeleteTaskRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function delete(DeleteTaskRequest $request, $id): JsonResponse
    {
        $deleted = $this->taskRepository->deleteTask($id);
        return response()->json($deleted, 204 );
    }

}
