<?php

namespace Module\Todolist;

use Illuminate\Support\ServiceProvider;

class TodolistProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->make('Module\Todolist\TodolistController');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
