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

    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Статьи за период')
            ->line($this->articles)
            ->action('Welcome', url('/articles'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
