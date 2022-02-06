<?php

namespace hanakivan\LaravelSimpleCms;

use Illuminate\Support\ServiceProvider;

class LaravelSimpleCMSServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', "hanakivan");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/auth.php');

        $this->loadViewsFrom(__DIR__.'/views', 'hanakivan');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        /*$this->publishes([
            __DIR__.'/database/seeders' => database_path('seeders/hanakivan'),
        ]);*/
    }
}
