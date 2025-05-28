<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view("session/index");
    }
    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
        'email.required' => 'Email is required',
        'password.required' => 'Password is required'
        ]);

        $loginData = [
        'email' => $request->email,
        'password' => $request->password
        ];

        if (Auth()->attempt($loginData)) {
            return redirect()->route('cart')->with('success', 'Login successful');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
        }    
    }
    function logout(Request $request){
        Auth::logout();
        return redirect()->route('index')->with('success', 'Logout successful');
    }
}
