<?php

namespace App\Http\DTO;

use Illuminate\Contracts\Support\Responsable;
use Spatie\LaravelData\Data;

class ApiResponseDTO extends Data implements Responsable
{
    public function __construct(
        public readonly ?array $data,
        public readonly ?string $message,
        public readonly int $httpStatus = 200
    ) {
    }

    public function toResponse($request): \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        return response()->json([
            'data' => $this->data,
            'message' => $this->message
        ], $this->httpStatus);
    }

}
