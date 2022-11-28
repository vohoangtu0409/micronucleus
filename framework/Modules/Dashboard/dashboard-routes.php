<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web'], 'prefix' => 'dashboard'], function () {
    Route::get("/", [Module\Dashboard\Controllers\IndexController::class, 'index'])->name("dashboard.index");
    Route::get("/blank", [Module\Dashboard\Controllers\IndexController::class, 'blank'])->name("dashboard.blank");
    Route::middleware(['guest:admin'])
         ->group(function(){
             Route::get("/login",[Module\Dashboard\Controllers\LoginController::class, "showLoginForm"])->name("dashboard.login");
         });
});


