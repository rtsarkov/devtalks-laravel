<?php


namespace App\Repositories;


use App\DTO\CommentDTO;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(CommentDTO $commentDTO)
    {
        return Comment::query()->create([
            'id' => $commentDTO->id,
            'text' => $commentDTO->text,
            'task_id' => $commentDTO->task_id,
        ]);
    }

    public function update(Comment $comment, CommentDTO $commentDTO): Comment
    {
        $comment->update([
            'text' => $commentDTO->text,
            'task_id' => $commentDTO->task_id,
        ]);

        return $comment;
    }

    public function delete(int $id): bool
    {
        return Comment::destroy($id);
    }

    public function getForTask(int $task_id)
    {
        return Cache::remember('taskComments_'.$task_id, 60*60*24, static function () use ($task_id) {
            return Comment::query()
                ->where('task_id', $task_id)
                ->with('task')
                ->get();
        });
    }
}
