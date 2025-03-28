<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class AuthService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL', 'http://localhost:5000/api');
    }

    public function login($credentials)
    {
        try {
            $response = Http::post($this->baseUrl . '/auth/login', [
                'username' => $credentials['username'],
                'password' => $credentials['password'],
            ]);

            if ($response->successful()) {
                $data = $response->json();
                session([
                    'token' => $data['token'],
                    'user' => $data['user']
                ]);
                return $data;
            }

            return [
                'error' => $response->json()['message'] ?? 'Login failed'
            ];
        } catch (Exception $e) {
            return [
                'error' => 'Connection error. Please try again later.'
            ];
        }
    }

    public function logout()
    {
        session()->forget(['token', 'user']);
    }

    public function getUser()
    {
        return session('user');
    }

    public function isAuthenticated()
    {
        if (!session()->has('token') || !session()->has('user')) {
            return false;
        }

        try {
            // Verify token is still valid with API
            $response = Http::withToken(session('token'))
                ->get($this->baseUrl . '/auth/verify');

            if (!$response->successful()) {
                session()->forget(['token', 'user']);
                return false;
            }

            return true;
        } catch (Exception $e) {
            // If we can't verify, err on the side of requiring re-login
            session()->forget(['token', 'user']);
            return false;
        }
    }
}