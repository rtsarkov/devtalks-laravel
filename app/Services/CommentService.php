<?php


namespace App\Services;


use App\DTO\CommentDTO;
use App\Mail\CreateComment;
use App\Models\Comment;
use App\Models\Task;
use App\Repositories\CommentRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

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

    public static function clearCache()
    {
        $tasks = Task::all('id');
        foreach ($tasks as $task) {
            Cache::delete('taskComments_'. $task['id']);
        }
    }

}
