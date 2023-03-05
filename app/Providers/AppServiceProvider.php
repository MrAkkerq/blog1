<?php

namespace App\Providers;

use App\Models\Tag;
use App\Service\TagsSynchronizer;
use App\View\Components\Admin;
use App\View\Components\Alert;
use Facade\Ignition\Views\Compilers\BladeSourceMapCompiler;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagsSynchronizer::class, function () {
            return new TagsSynchronizer();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.sidebar', function ($view) {
            $view->with('tagsCloud', Tag::tagsCloud());
        });

        Blade::component(Alert::class, 'package-alert');
        Blade::component(Admin::class, 'admin');
    }
}
