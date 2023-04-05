<?php

namespace App\Providers;

use App\Contracts\CommentableInterface;
use App\Models\Article;
use App\Models\Tag;
use App\Models\TheNew;
use App\Service\CommentAdd;
use App\Service\TagsSynchronizer;
use App\View\Components\Admin;
use App\View\Components\Alert;
use Facade\Ignition\Views\Compilers\BladeSourceMapCompiler;
use Illuminate\Pagination\Paginator;
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

        $this->app->singleton(CommentAdd::class, function () {
            return new CommentAdd();
        });

//        $this->app->bind(\App\Contracts\CommentableInterface::class, \App\Models\Article::class);
//        $this->app->bind(\App\Contracts\CommentableInterface::class, \App\Models\TheNew::class);
//        $this->app->bind(\App\Contracts\CommentableInterface::class, function () {
//            dd($this);
//        });
//        $this->app->singleton(\App\Contracts\CommentableInterface::class, \App\Models\TheNew::class);
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

        Paginator::defaultSimpleView('pagination::simple-default');
    }
}
