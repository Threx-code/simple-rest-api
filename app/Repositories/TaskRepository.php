<?php

namespace App\Repositories;

use App\Contracts\TaskInterface;
use App\Contracts\TaskServiceInterface;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskRepository implements TaskInterface
{
    /**
     * @param TaskServiceInterface $service
     */
    public function __construct(private readonly TaskServiceInterface $service){
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getATask($id): mixed
    {
        return $this->service->getATask($id);
    }

    /**
     * @return mixed
     */
    public function getAllTasks(): mixed
    {
        return $this->service->getAllTasks();
    }

    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function createTask($request): mixed
    {
        return $this->service->createTask($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function editTask($request, $id): mixed
    {
        return $this->service->editTask($request, $id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteTask($id): bool
    {
        return $this->service->deleteTask($id);
    }

}
