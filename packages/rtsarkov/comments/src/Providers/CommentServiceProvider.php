<?php

namespace Rtsarkov\Comments\Providers;

use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->publishes([
            __DIR__.'/../config/comments.php' => config_path('comments.php'),
        ]);
    }
}
