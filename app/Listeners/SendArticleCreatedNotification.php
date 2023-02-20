<?php

namespace App\Listeners;

use App\Events\ArticleCreated;

class SendArticleCreatedNotification
{
    public function handle(ArticleCreated $event)
    {
        $event->article->notify(new \App\Notifications\ArticleCreated());
    }
}
