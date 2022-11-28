<?php

namespace Module;

use Illuminate\Support\ServiceProvider;
use Module\Auth\Providers\AuthServiceProvider;
use Module\Core\Providers\CoreServiceProvider;
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
        $this->app->register(CoreServiceProvider::class);
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
