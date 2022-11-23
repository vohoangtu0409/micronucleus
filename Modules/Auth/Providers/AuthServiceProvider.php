<?php

namespace Module\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->replaceDefaultAuthConfiguration();
        $this->loadMigrationsFrom(
            dirname(__DIR__). "/Migrations"
        );
        $this->loadViewsFrom(dirname(__DIR__). "/Views", "auth");
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    private function replaceDefaultAuthConfiguration(){
        $config = $this->app->make('config');
        $config->set("auth",array_merge(
            $config->get("auth"),
            include dirname(__DIR__). "/Configs/configs.php"
        ));
    }
}
