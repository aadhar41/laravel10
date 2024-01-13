<?php

namespace App\Mail;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentPostedMarkdown extends Mailable
{
    use Queueable, SerializesModels;
    public $comment;

    /**
     * Create a new message instance.
     */
    public function __construct(
        Comment $comment
    ) {
        $this->comment = $comment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: env('MAIL_FROM_ADDRESS', 'hello@example.com'),
            subject: "Comment was posted on your {$this->comment->commentable->title} blog post.",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.posts.commented-markdown',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromStorage($this->comment->user->image->path)
            //     ->as('profile_picture.jpeg')
            //     ->withMime('image/jpeg'),
        ];
    }
}