<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Apply middleware to rate limit login attempts
     */
    public function __invoke()
    {
        $this->middleware('throttle:6,1', ['only' => ['login', 'showLoginForm']]);
    }

    // Show login page
    public function showLoginForm()
    {
        // If already authenticated, redirect to dashboard
        if ($this->authService->isAuthenticated()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    // Handle login logic
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $result = $this->authService->login($request->only('username', 'password'));

        if (isset($result['error'])) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['error' => $result['error']]);
        }

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        $this->authService->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
