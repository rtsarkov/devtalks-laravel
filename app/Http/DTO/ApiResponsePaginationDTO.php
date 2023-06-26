<?php

namespace App\Http\DTO;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Contracts\DataObject;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class ApiResponsePaginationDTO extends Data implements Responsable
{
    public function __construct(
        public readonly LengthAwarePaginator $paginator,
        #[DataCollectionOf(DataObject::class)]
        public readonly DataCollection $collection
    ) {
    }

    public function toResponse($request): \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        return response()->json([
            'data' => $this->collection->toArray(),
            'meta' => [
                'currentPage' => $this->paginator->currentPage(),
                'count' => $this->paginator->count(),
                'nextPage' => $this->paginator->nextPageUrl(),
                'prevPage' => $this->paginator->previousPageUrl(),
                'perPage' => $this->paginator->perPage(),
                'total' => $this->paginator->total(),
            ]
        ]);
    }
}

