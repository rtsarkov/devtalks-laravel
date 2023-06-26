<?php

namespace App\Repositories;

use App\DTO\CreateTaskDTO;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(CreateTaskDTO $data): array
    {
        return Task::create($data->toArray())->toArray();
    }
}
