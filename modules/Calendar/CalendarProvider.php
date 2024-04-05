<?php

namespace Module\Calendar;

use Illuminate\Support\ServiceProvider;

class CalendarProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->make('Module\Calendar\CalendarController');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
