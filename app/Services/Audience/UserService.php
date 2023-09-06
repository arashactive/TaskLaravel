<?php

namespace App\Services\Audience;

use App\Http\Requests\Audience\UserLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * Attempt user login.
     *
     * @param UserLoginRequest $request
     * @return RedirectResponse
     */
    public function login(UserLoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Logout the user.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}