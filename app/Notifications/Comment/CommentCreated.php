<?php

namespace App\Notifications\Comment;

use App\App\Notifications\Channels\DatabaseChannel;
use App\App\Notifications\Notification;
use App\Comment;
use Illuminate\Bus\Queueable;

class CommentCreated extends Notification
{
    use Queueable;

    public $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            DatabaseChannel::class
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'author' => [
                'name' => $this->comment->author->name
            ],
            'comment' => [
                'id' => $this->comment->id,
                'body' => $this->comment->body,
            ]
        ];
    }
}
