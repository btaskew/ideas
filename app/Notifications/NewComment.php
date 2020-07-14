<?php

namespace App\Notifications;

use App\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewComment extends Notification
{
    use Queueable;

    /**
     * @var Idea
     */
    private Idea $idea;

    /**
     *
     * @param Idea $idea
     */
    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    /**
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('You got a comment!')
            ->greeting('Hey there!')
            ->line('Someone has commented on your idea "' . $this->idea->title .'".')
            ->action('View your amazing idea', url('/ideas/' . $this->idea->id));
    }

    /**
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
