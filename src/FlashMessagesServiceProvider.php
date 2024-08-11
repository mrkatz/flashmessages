<?php

namespace Mrkatz\FlashMessages;

use Illuminate\Support\ServiceProvider;

class FlashMessagesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/flash.php',
            'flash'
        );

        $this->app->singleton(Flash::class, function () {
            return new Flash();
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'flash');
        $this->publishViews();
        $this->publishConfig();
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/flash.php' => config_path('flash.php'),
        ], 'flash:config');
    }

    protected function publishViews()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/flashmessages'),
        ], 'flash:views');
    }
}
