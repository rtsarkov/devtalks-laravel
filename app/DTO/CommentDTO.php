<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class CommentDTO extends Data
{
    public ?int $id;
    public string $text;
    public int $task_id;

    public function __construct($id, $text, $task_id)
    {
        $this->id = $id;
        $this->text = $text;
        $this->task_id = $task_id;
    }
}

