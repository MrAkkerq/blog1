<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PublishedArticlesWithPeriodNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $articles;
    protected $subject;

    public function __construct($articles, $subject)
    {
        $this->articles = $articles;
        $this->subject = $subject;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->line($this->articles)
            ->action('Welcome', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
