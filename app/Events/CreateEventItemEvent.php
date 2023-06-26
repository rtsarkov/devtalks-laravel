<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class CreateEventItemEvent
{
    use Dispatchable;

    public function __construct(public array $data)
    {
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
