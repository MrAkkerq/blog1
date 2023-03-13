<?php

namespace App\Providers;

use App\Service\Pushall;
use Illuminate\Support\ServiceProvider;

class PushAllServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Pushall::class, function() {
            return new Pushall(config('box.pushall.api.key'), config('box.pushall.api.id'));
        });
    }

    public function boot(): void
    {
    }
}
