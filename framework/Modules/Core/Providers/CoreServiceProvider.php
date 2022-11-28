<?php

namespace Module\Core\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(dirname(__DIR__). "/Views", "core");


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
            include dirname(__DIR__). "/Configs/auth.php"
        ));
    }
}
