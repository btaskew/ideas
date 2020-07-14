<?php

namespace App\Notifications;

use App\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VoteRecorded extends Notification
{
    use Queueable;

    /**
     * @var Idea
     */
    private Idea $idea;

    /**
     * @param Idea $idea
     */
    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    /**
     * @return array
     */
    public function via()
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('You got a vote!')
            ->greeting('Hey there!')
            ->line('Someone has voted for your idea "' . $this->idea->title .'".')
            ->action('View your amazing idea', url('/ideas/' . $this->idea->id))
            ->line('Great job!');
    }

    /**
     * Get the array representation of the notification.
     *
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
