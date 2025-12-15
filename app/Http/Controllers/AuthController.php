<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;   

class AuthController extends Controller
{
    /* ============================
       SHOW REGISTER FORM
    ============================ */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /* ============================
       HANDLE REGISTRATION
    ============================ */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']), // ✅ correct hashing
        ]);

        Auth::login($user);

        return redirect()->intended('/')->with('success', 'Registration successful.');
    }

    /* ============================
       SHOW LOGIN FORM
    ============================ */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /* ============================
       HANDLE LOGIN
    ============================ */
    public function Submitlogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    /* ============================
       LOGOUT
    ============================ */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
