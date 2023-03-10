<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class SendCountPublishedArticlesWithDateToAllUsersCommand extends Command
{
    protected $signature = 'send:count-published-articles-with-date-to-all-users {dateFrom} {dateTo}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $users = \App\Models\User::all();

        //$countPublishedArticlesWithDate = Article::get()->getCountPublishedArticlesWith($this->argument('date'));
        $publishedArticlesWithPeriod = Article::get()->publishedArticlesWithPeriod($this->argument('dateFrom'), $this->argument('dateTo'));
        $dateFrom = $this->argument('dateFrom');
        $dateTo = $this->argument('dateTo');
        $articles = implode(', ', $publishedArticlesWithPeriod->pluck('title')->toArray());

        //dd(implode(', ', $publishedArticlesWithPeriod->pluck('title')->toArray()));
        $users->map->notify(new \App\Notifications\PublishedArticlesWithPeriodNotification($articles));
        $this->info("Уведомление и название статей вышедших за {$dateFrom} - {$dateTo}: " . $articles) ;
    }
}
