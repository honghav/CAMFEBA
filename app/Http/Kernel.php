<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // Web middleware
        ],
        'api' => [
            // API middleware
        ],
    ];
    
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        // Add your custom middleware here
        'role' => \App\Http\Middleware\IsAdmin::class
    ];
}
