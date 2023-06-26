<?php


namespace App\Services;


use App\DTO\CommentDTO;
use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;

class CommentService
{
    protected CommentRepositoryInterface $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function create(CommentDTO $commentDTO)
    {
        return $this->commentRepository->create($commentDTO);
    }

    public function update(Comment $comment, CommentDTO $commentDTO)
    {
        return $this->commentRepository->update($comment, $commentDTO);
    }

    public function delete(int $id): bool
    {
        return $this->commentRepository->delete($id);
    }

}
