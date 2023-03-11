<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class SendCountPublishedArticlesWithDateToAllUsersCommand extends Command
{
    protected $signature = 'send:count-published-articles-with-date-to-all-users
     {dateFrom?}
     {dateTo?}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $users = \App\Models\User::all();

        $dateFrom = $this->argument('dateFrom') ?? Carbon::yesterday()->subDays(7)->startOfWeek();
        $dateTo = $this->argument('dateTo') ?? Carbon::today();

        $subject = "Статьи вышедшие за период {$dateFrom->toDateString()} по {$dateTo->toDateString()}";

        $publishedArticlesWithPeriod = Article::get()->publishedArticlesWithPeriod($dateFrom, $dateTo);
        $articles = implode(', ', $publishedArticlesWithPeriod->pluck('title')->toArray());

        $users->map->notify(new \App\Notifications\PublishedArticlesWithPeriodNotification($articles, $subject));
        $this->info("Уведомление и название статей вышедших за {$dateFrom} - {$dateTo}: " . $articles) ;
    }
}
