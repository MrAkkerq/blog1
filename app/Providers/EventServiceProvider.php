<?php

namespace App\Providers;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleting;
use App\Events\ArticleUpdating;
use App\Listeners\SendArticleCreatedNotification;
use App\Listeners\SendArticleDeletingNotification;
use App\Listeners\SendArticleUpdatingNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ArticleCreated::class => [
            SendArticleCreatedNotification::class,
        ],
        ArticleUpdating::class => [
            SendArticleUpdatingNotification::class,
        ],
        ArticleDeleting::class => [
            SendArticleDeletingNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
