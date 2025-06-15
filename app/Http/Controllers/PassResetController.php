<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PassResetController extends Controller
{
    public function showForgotForm(): View
    {
        return view('session.req-forgot-pass');
    }

    public function sendResetLinkEmail(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __((string)$status)])
            : back()->withErrors(['email' => __((string)$status)]);
    }

    // Reset password form (sebelum login)
    public function showResetForm(string $token): View
    {
        return view('session.reset-pass', ['token' => $token]);
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password){
                if ($user !== null && is_string($password)) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            }
        );
        $statusMessage = is_string($status) ? __($status) : '';
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => $statusMessage])
            : back()->withErrors(['email' => $statusMessage]);
    }

    // Ganti password setelah login
    public function showChangePasswordForm(): View
    {
        return view('session.reset-pass'); 
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if ($user === null || !is_string($request->current_password) || !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        if (is_string($request->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('password.change')->with('status', 'Successfully changed password');
    }
}