<?php

namespace App\Http\Controllers;

use App\DTO\CommentDTO;
use App\Http\DTO\ApiResponseDTO;
use App\Http\Requests\CommnetCreateRequest;
use App\Http\Requests\CommnetUpdateRequest;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryInterface;
use App\Services\CommentService;
use Illuminate\Support\Facades\Response;

class CommentController extends Controller
{
    protected CommentService $commentService;
    protected CommentRepositoryInterface $commentRepository;

    public function __construct(CommentService $commentService, CommentRepositoryInterface $commentRepository)
    {
        $this->commentService = $commentService;
        $this->commentRepository = $commentRepository;
    }

    public function create(CommnetCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        $request->validated();
        $this->commentService->create(CommentDTO::from($request->only(['text', 'task_id'])));
        return Response::json(['success' => true, 'message' => 'Комментарий принят!']);
    }

    public function getForTask(int $task_id): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'data' => $this->commentRepository->getForTask($task_id)
        ]);
    }

    public function update(CommnetUpdateRequest $request, Comment $comment): \Illuminate\Http\JsonResponse
    {
        $request->validated();
        $updatedComment = $this->commentService->update($comment, CommentDTO::from($request->only('text', 'task_id')));
        return Response::json([
            'success' => true,
            'message' => 'Комментарий обновлен!',
            'data' => $updatedComment
        ]);
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $comment = $this->commentService->delete($id);
        if ($comment) {
            return Response::json([
                'message' => 'Комментарий успешно удален',
            ]);
        }
        return Response::json([], 204);
    }

}
