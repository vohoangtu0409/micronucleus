<?php

namespace Module;

use Illuminate\Support\ServiceProvider;
use Module\Auth\Providers\AuthServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AuthServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
