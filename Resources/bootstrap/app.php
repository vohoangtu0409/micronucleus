<?php
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Tuezy\EE;
return EE::configure(dirname(__DIR__) . DIRECTORY_SEPARATOR )
    ->withProviders(
        providers: [
            \App\Dashboard\DashboardServiceProvider::class
        ]
    )
->withRouting(
web: dirname(__DIR__) . '/../App/Dashboard/routes.php',
)
->withMiddleware(function (Middleware $middleware) {
$middleware->alias([

]);
})
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Route not found.'
                ], 200);
            }
        });
        $exceptions->shouldRenderJsonWhen(function ($request,Throwable $ex){
            if ($request->is('api/*')) {
                return true;
            }
            return $request->expectsJson();
        });
    })->create();