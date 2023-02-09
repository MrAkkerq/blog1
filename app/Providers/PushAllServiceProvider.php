<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PushAllServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\App\Service\Pushall::class, function() {
            return new \App\Service\Pushall(config('box.pushall.api.key'));
        });
    }

    public function boot()
    {
        //
    }
}
