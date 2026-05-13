<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // ✅ Show Login Page
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ✅ Handle Login
    public function login(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // ✅ Attempt Login (with remember option)
        if (Auth::attempt(
            $request->only('email', 'password'),
            $request->filled('remember')
        )) {
            $request->session()->regenerate();

            return redirect()->to('admin/dashboard');
        }

        // ❌ Login Failed
        return back()
            ->withInput($request->only('email', 'remember'))
            ->with('error', 'Email or Password is incorrect.');
    }

    // ✅ Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}