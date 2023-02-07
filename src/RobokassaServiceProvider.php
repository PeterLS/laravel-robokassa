<?php

namespace PeterLS\LaravelRobokassa;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Console\AboutCommand;
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

        AboutCommand::add('Robokassa Laravel package', static fn () => ['Version' => '1.0.0']);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void {
        $this->app->bind(Robokassa::class, static function (Application $app) {
            return new Robokassa($app['config']['robokassa']);
        });
    }

    public function provides(): array {
        return [Robokassa::class];
    }
}
