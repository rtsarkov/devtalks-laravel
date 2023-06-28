<?php

namespace App\Observers;

use App\DTO\CommentDTO;
use App\Mail\CreateComment;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Support\Facades\Mail;

class CommentObserver
{
    protected CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Handle the Commnet "created" event.
     */
    public function created(Comment $comment): void
    {
        Mail::to(config('app.email_alert'))->queue(new CreateComment(CommentDTO::from($comment)));
        $this->commentService::clearCache();
    }

    /**
     * Handle the Commnet "updated" event.
     */
    public function updated(): void
    {
        $this->commentService::clearCache();
    }

    /**
     * Handle the Commnet "deleted" event.
     */
    public function deleted(): void
    {
        $this->commentService::clearCache();
    }

}
