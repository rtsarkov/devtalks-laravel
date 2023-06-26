<?php


namespace App\Http\DTO;

use Illuminate\Contracts\Support\Responsable;
use Spatie\LaravelData\Data;
use Symfony\Component\HttpFoundation\Response;

class ApiErrorResponseDTO extends Data implements Responsable
{
    public function __construct(
        public readonly ?array $errors,
        public readonly ?string $message,
        public readonly int $httpStatus = Response::HTTP_BAD_REQUEST
    ) {
    }

    public function toResponse($request): \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        return response()->json([
            'errors' => $this->errors,
            'message' => $this->message
        ], $this->httpStatus);
    }
}
