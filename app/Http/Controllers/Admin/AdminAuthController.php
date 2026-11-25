<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminAuthController
{
    /**
     * Show the admin login form.
     */
    public function showLogin(): View|RedirectResponse
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Handle admin login submission.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $adminEmail = 'admin@polyplex.in';
        $adminPassword = 'admin@123';

        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            session([
                'admin_logged_in' => true,
                'admin_email' => $adminEmail,
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()->withInput($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log the admin out.
     */
    public function logout(Request $request): RedirectResponse
    {
        session()->forget(['admin_logged_in', 'admin_email']);

        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }
}
