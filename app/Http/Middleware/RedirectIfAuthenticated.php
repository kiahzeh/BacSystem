<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\AuthService;

class RedirectIfAuthenticated
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function handle(Request $request, Closure $next)
    {
        // If authenticated, redirect to dashboard
        if ($this->authService->isAuthenticated()) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}