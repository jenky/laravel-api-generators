<?php

namespace Jenky\LaravelApiGenerators;

use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerControllerGenerator();
        $this->registerRequestGenerator();
        $this->registerModelGenerator();
    }

    /**
     * Register the make:api:controller command.
     *
     * @return void
     */
    protected function registerControllerGenerator()
    {
        $this->app->singleton('command.api.controller', function ($app) {
            return $app[Commands\ControllerMakeCommand::class];
        });

        $this->commands('command.api.controller');
    }

    /**
     * Register the make:api:request command.
     *
     * @return void
     */
    protected function registerRequestGenerator()
    {
        $this->app->singleton('command.api.request', function ($app) {
            return $app[Commands\RequestMakeCommand::class];
        });

        $this->commands('command.api.request');
    }

    /**
     * Register the make:api:model command.
     *
     * @return void
     */
    protected function registerModelGenerator()
    {
        $this->app->singleton('command.api.model', function ($app) {
            return $app[Commands\ModelMakeCommand::class];
        });

        $this->commands('command.api.model');
    }
}
