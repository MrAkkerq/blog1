<?php

namespace App\Listeners;

use App\Events\ArticleUpdating;

class SendArticleUpdatingNotification
{
    public function handle(ArticleUpdating $event)
    {
        $event->article->notify(new \App\Notifications\ArticleUpdating());
    }
}
