<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class CreateTaskDTO extends Data
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $description
    )
    {
    }
}
