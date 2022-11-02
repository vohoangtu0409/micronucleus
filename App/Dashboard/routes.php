<?php
use Illuminate\Support\Facades\Route;
Route::prefix("dashboard")
    ->get("/", \App\Dashboard\Controllers\IndexController::class."@index");