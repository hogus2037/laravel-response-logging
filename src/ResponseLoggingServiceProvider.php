<?php

namespace Hogus\LaravelResponseLogging;

use Illuminate\Support\ServiceProvider;

class ResponseLoggingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ .'/../config.php', 'logging.channels');
    }
}
