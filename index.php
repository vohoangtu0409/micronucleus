<?php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require "vendor/autoload.php";

$app = new \Tuezy\EE(__DIR__ . DIRECTORY_SEPARATOR . "Resources");

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    Illuminate\Foundation\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Illuminate\Foundation\Exceptions\Handler::class
);

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);