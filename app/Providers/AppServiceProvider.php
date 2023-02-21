<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton('example', function() {
//            return 'hello';
//        });
        Collection::macro('toUpper', function() {
            return $this->map(function ($item) {
                return Str::upper($item);
            });
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

//        Blade::component('components.alert', 'alert');

        Blade::directive('datetime', function ($value) {
            return "<?php echo ($value)->toFormattedDateString()?>";
        });

        Blade::if('env', function ($env) {
            return app()->environment($env);
        });
    }
}
