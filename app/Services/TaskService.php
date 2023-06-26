<?php

namespace App\Services;

use App\DTO\CreateTaskDTO;
use App\Models\Task;
use App\Repositories\TaskRepositoryInterface;

class TaskService
{
    public function __construct(protected TaskRepositoryInterface $repository)
    {
    }

    public function create(CreateTaskDTO $data): array
    {
        return $this->repository->create($data);
    }
}
