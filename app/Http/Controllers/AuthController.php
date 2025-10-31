<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Logout the current user.
     */
    public function logout()
    {
        Auth::logout();  // Logout pengguna

        Session::invalidate();  // Invalidate session
        Session::regenerateToken();  // Regenerate CSRF token

        return redirect()->route('home');  // Redirect ke halaman login
    }
}
