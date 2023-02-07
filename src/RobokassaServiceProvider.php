<?php

namespace PeterLS\LaravelRobokassa;

use Illuminate\Support\ServiceProvider;

class RobokassaServiceProvider extends ServiceProvider {
    /**
     * Application is booting.
     *
     * @return void
     */
    public function boot(): void {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('robokassa.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/robokassa'),
        ], 'views');

        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'robokassa');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'robokassa');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void {
        $this->app->bind('robokassa', static function () {
            return new Robokassa(config('robokassa'));
        });
    }

    public function provides(): array {
        return ['robokassa'];
    }
}
