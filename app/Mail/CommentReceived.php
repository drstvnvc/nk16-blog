<?php

namespace App\Mail;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, User $user)
    {
        $this->user = $user;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Comment received')
            ->from($this->user->email, $this->user->name)
            ->view('emails.comment-received')
            ->with([
                'recipientName' => $this->comment->post->author->name,
                'commentAuthor' => $this->user->name,
                'postTitle' => $this->comment->post->title,
                'commentBody' => $this->comment->body,
            ]);
    }
}
