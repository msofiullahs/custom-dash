<?php

namespace Module\Scrum;

use Illuminate\Support\ServiceProvider;

class ScrumProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->make('Module\Scrum\ScrumController');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
