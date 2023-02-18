<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleCreatedNotification
{
    public function handle(ArticleCreated $event)
    {
        $event->article->notify(new \App\Notifications\ArticleCreated());
    }
}
