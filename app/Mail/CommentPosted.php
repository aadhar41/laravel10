<?php

namespace App\Mail;

use App\Models\Comment;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentPosted extends Mailable
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
            // replyTo: ['address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'), 'name' => env('MAIL_FROM_NAME', 'Blog')],
            subject: "Comment was posted on your {$this->comment->commentable->title} blog post.",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.posts.commented',
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
            // Attachment::fromPath(
            //     storage_path('app' . DIRECTORY_SEPARATOR . 'public') . DIRECTORY_SEPARATOR .  $this->comment->user->image->path,
            // )->as('profile_picture.jpeg')
            //     ->withMime('image/jpeg'),

            // Attachment::fromStorage($this->comment->user->image->path)
            //     ->as('profile_picture.jpeg')
            //     ->withMime('image/jpeg'),
        ];
    }
}