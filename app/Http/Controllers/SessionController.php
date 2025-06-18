<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class SessionController extends Controller
{
    public function index(): View
    {
        return view("session.index");
    }

    public function registerForm(): View
{
    return view('session.register');
}

    public function register(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect()->intended('cart')->with('success', 'Registration successful!');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('cart');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

public function deleteAccount(Request $request): RedirectResponse
    {

        $user = Auth::user();

        if ($user) { 
            Auth::logout();
            
            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'Your account has been deleted successfully.');
        }

        return redirect('/')->with('error', 'No authenticated user found for deletion.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Logout successful');
    }
}