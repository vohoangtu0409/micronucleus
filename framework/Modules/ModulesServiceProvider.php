<?php

namespace Module;

use Illuminate\Support\ServiceProvider;
use Module\Auth\Providers\AuthServiceProvider;
use Module\Dashboard\Providers\DashboardServiceProvider;

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
        $this->app->register(DashboardServiceProvider::class);
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
