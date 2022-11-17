<?php

namespace Mod;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\PackageManifest;
use Illuminate\Foundation\ProviderRepository;
use Illuminate\Support\Collection;

class EE extends Application
{
    public function bootstrapPath($path = '')
    {
        return ROOT . 'bootstrap'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function registerConfiguredProviders()
    {
        $this->modAppProviders();
        parent::registerConfiguredProviders();
    }

    private function modAppProviders(){
        $config = $this->app->make('config');
        $config->set(
            "app.providers",
            array_merge(
                array_diff($config->get("app.providers"), ["App\Providers\RouteServiceProvider"]), //remove RouteServiceProvider
                [RouteServiceProvider::class]
            )
        );
    }
}
