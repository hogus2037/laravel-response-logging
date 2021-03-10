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
        if (!$this->app->configurationIsCached()) {
            $configPath = __DIR__.'/config.php';

            $this->publishes([$configPath => config_path('response-logging.php')], 'config');

            $this->mergeConfig('logging.channels');
        }
    }

    protected function mergeConfig($key)
    {
        $config = $this->app->make('config');

        $config->set($key, array_merge(
            $config->get('response-logging.channels', []),
            $config->get($key, []))
        );
    }
}
