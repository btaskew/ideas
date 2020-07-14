<?php

namespace App\Notifications;

use App\Idea;
use App\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusUpdated extends Notification
{
    use Queueable;

    /**
     * @var Idea
     */
    private Idea $idea;

    /**
     * @var Status
     */
    private Status $status;

    /**
     * @param Idea   $idea
     * @param Status $status
     */
    public function __construct(Idea $idea, Status $status)
    {
        $this->idea = $idea;
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function via()
    {
        return ['mail'];
    }

    /**
     * @return MailMessage
     */
    public function toMail()
    {
        return (new MailMessage)
            ->subject('The status of your idea has been updated!')
            ->greeting('Hey there!')
            ->line('The status of your idea "' . $this->idea->title . '" has been updated to: ' . $this->status->name)
            ->line($this->setFeedback())
            ->action('View your amazing idea', url('/ideas/' . $this->idea->id));
    }

    /**
     * @return string
     */
    private function setFeedback(): string
    {
        if ($this->status->status === 'released') {
            return 'Congratulations! Thanks for contributing to this project.';
        }

        if ($this->status->status === 'rejected') {
            return 'Sorry your idea wasn\'t progressed. Check out the comment that the site admin left for more feedback.';
        }

        return 'Check out the comment that the site admin left for more information.';
    }
}
