<?php

namespace Module\Mailbox;

use Illuminate\Support\ServiceProvider;

class MailboxProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->make('Module\Mailbox\MailboxController');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
