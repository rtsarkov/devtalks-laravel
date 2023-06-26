<?php


namespace App\Repositories;


use App\DTO\CommentDTO;
use App\Models\Comment;

interface CommentRepositoryInterface
{
    public function create(CommentDTO $commentDTO);

    public function update(Comment $comment, CommentDTO $commentDTO);

    public function delete(int $id);
}
