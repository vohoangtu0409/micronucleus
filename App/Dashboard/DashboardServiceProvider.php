<?php
namespace App\Dashboard;

use Closure;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . "/routes.php");
        $this->loadViewsFrom(__DIR__ . "/Views", 'dashboard');
    }
}