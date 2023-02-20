<?php

namespace App\Listeners;

use App\Events\ArticleDeleting;

class SendArticleDeletingNotification
{
    public function handle(ArticleDeleting $event)
    {
        $event->article->notify(new \App\Notifications\ArticleDeleting());

    }
}
