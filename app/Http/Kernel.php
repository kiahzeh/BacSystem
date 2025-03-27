<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // ... existing middleware ...
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // ... existing web middleware ...
        ],

        'api' => [
            // ... existing API middleware ...
        ],
    ];

    /**
     * The application's route middleware aliases.
     *
     * Aliases may be used instead of class names to assign middleware to routes.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\CheckAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // ... other middleware aliases ...
    ];

    /**
     * Register the middleware.
     *
     * @return void
     */
    public function registerMiddleware()
    {
        // ... existing middleware registration ...
    }
}