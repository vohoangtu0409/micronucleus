<?php

namespace Module\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(
            dirname(__DIR__). "/Migrations"
        );
        $this->loadViewsFrom(dirname(__DIR__). "/Views", "dashboard");
        $this->loadRoutesFrom(dirname(__DIR__). "/dashboard-routes.php");


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(dirname(__DIR__). "/Lang", "dashboard");
    }

}
