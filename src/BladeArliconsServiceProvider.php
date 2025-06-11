<?php

declare(strict_types=1);

namespace BladeUI\Arlicons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeArliconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-arlicons', []);

            $factory->add('default', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-arlicons.php', 'blade-arlicons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-arlicons'),
            ], 'blade-arlicons');

            $this->publishes([
                __DIR__.'/../config/blade-arlicons.php' => $this->app->configPath('blade-arlicons.php'),
            ], 'blade-arlicons-config');
        }
    }
}
