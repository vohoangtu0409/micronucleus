<?php
use Illuminate\Support\Facades\Route;

Route::prefix("/dashboard")->middleware("web")->group(function (){
    Route::middleware(['auth:admin'])->group(function(){
        Route::get("/", function(){
        })->name("dashboard.index");
    });
    Route::middleware(['guest:admin'])
         ->namespace("Module/Dashboard/Controllers")
         ->group(function(){
             Route::get("/login",[Module\Dashboard\Controllers\LoginController::class, "showLoginForm"])->name("dashboard.login");
    });
});

