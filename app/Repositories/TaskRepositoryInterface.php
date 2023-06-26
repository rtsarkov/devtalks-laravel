<?php

namespace App\Repositories;

use App\DTO\CreateTaskDTO;

interface TaskRepositoryInterface
{
    public function create(CreateTaskDTO $data): array;
}
